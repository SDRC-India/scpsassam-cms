<?php


class SupsysticTablesPro_Importer_Type_Xlsx implements SupsysticTablesPro_Importer_Interface
{
    /**
     * {@inheritdoc}
     */
    public function import($fileName)
    {
        // http://stackoverflow.com/questions/30107011/phpexcel-unexpected-float-behavior
        $savedPrecision = ini_get('precision');
        $result = array();
        $reader = PHPExcel_IOFactory::createReader(
            PHPExcel_IOFactory::identify($fileName)
        );
        $reader->setReadDataOnly(false);
        $excel = $reader->load($fileName);

        $sheet = $excel->getActiveSheet();
        $rows = $sheet->getRowIterator();

        $totalColumns = 0;
        $totalRows = 0;

        $rowNumber = 0;
        $columnNumber = 0;

        ini_set('precision', $savedPrecision);


        foreach ($rows as $row) {
            $cells = $row->getCellIterator();
            $cells->setIterateOnlyExistingCells(false);
            $height = $sheet->getRowDimension($row->getRowIndex())->getRowHeight();
            $height = round($height * 1.333333); // pt to px
            $result[$rowNumber] = array('cells' => array(), 'height' => $height);

            foreach ($cells as $cell) {
                $row = $this->getRowIndex($cell->getRow());
                $col = $cell->getColumn();
				$calculatedValue = '';
                $width = $sheet->getColumnDimension($col)->getWidth();
				$columnNumber++;

                if ($width !== -1) {
                    $width = round($width * 5.5);
                } else {
                    $width = 0;
                }

                try {
                    $data = $cell->getFormattedValue();
                } catch (PHPExcel_Calculation_Exception $e) {
                    $data = '';
                }

                if ($cell->isFormula()) {
					try {
						PHPExcel_Calculation::getInstance()->calculateFormula($cell->getValue(), null, $cell);
						$calculatedValue = $data;
						$data = $cell->getValue();
					} catch (PHPExcel_Calculation_Exception $e) {
						$data = (string) PHPExcel_Style_NumberFormat::toFormattedString(
							$cell->getOldCalculatedValue(),
							$cell->getStyle()->getNumberFormat()->getFormatCode()
						);
					}
                }

                if (!$data) {
                    if ($cell->getStyle()->getFill()->getFillType() === 'none') {
                        $result[$row]['cells'][$col] = array(
                            'data' => '',
                            'width' => strval(round($width)),
                            'meta' => array(),
                        );
                        continue;
                    }
                }

                $totalColumns = max($totalColumns, $columnNumber);
                $totalRows = max($totalRows, $rowNumber);

                $cellStyle = $cell->getStyle();
                $cellFill = $cellStyle->getFill();
                $cellFont = $cellStyle->getFont();
                $cellAlignment = $cellStyle->getAlignment();
				$horizontalAlignment = $cellAlignment->getHorizontal();
				$verticalAlignment =  $cellAlignment->getVertical();
				$bgColorData = $cellFill->getStartColor();
				$fontColorData = $cellFont->getColor();
				$bgColor = $bgColorData->getRGB();
				$fontColor = $fontColorData->getRGB();

				if(strlen($bgColor) == 4) {
					$bgColor = $bgColorData->getARGB();
				}
				if(strlen($bgColor) == 8) {
					$bgColor = substr($bgColor, 2);
				}
				if(strlen($fontColor) == 4) {
					$fontColor = $fontColorData->getARGB();
				}
				if(strlen($fontColor) == 8) {
					$fontColor = substr($fontColor, 2);
				}

				$meta = array();

                if ($cell->hasHyperlink()) {
					if(preg_match('/mailto:([A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}).*"(.*)"/i', $data, $match)) {
						if(!empty($match[2])) {
							$data = $match[2];
						} else if(!empty($match[1])) {
							$data = $match[1];
						}
					}
					$data = '<a href="' . $cell->getHyperlink()->getUrl() . '">' . $data . '</a>';
                }
                if ($cellFill->getFillType() !== 'none') {
                    $meta[] = 'bg-' . strtolower($bgColor);
                }

				if ($fontColor != '000000') {
					$meta[] = 'color-' . strtolower($fontColor);
				}

                if ($cellFont->getBold()) {
                    $meta[] = 'bold';
                }

                if ($cellFont->getItalic()) {
                    $meta[] = 'italic';
                }

                if ($horizontalAlignment !== 'general') {
                    $meta[] = 'ht' . ucfirst($horizontalAlignment);
                }
                if ($verticalAlignment == 'center') {
                    $verticalAlignment = 'middle';
                }
                $meta[] = 'ht' . ucfirst($verticalAlignment);
   
                $result[$row]['cells'][$col] = array(
                    'data'  => $data,
                    'meta'  => $meta,
                    'width' => strval(round($width)),
                    'calculatedValue' => $calculatedValue,
                );
            }

            $rowNumber++;
            $columnNumber = 0;
        }

        $result = array_slice($result, 0, $totalRows + 1);

        foreach ($result as &$row) {
            $cells = array_slice($row['cells'], 0, $totalColumns);
            $row['cells'] = array_values($cells);
        }
        
        return $result;
    }

    /**
     * Returns column index for the cell.
     * @param string $columnName Column name (A, B, C, etc)
     * @return int Column index
     */
    protected function getColumnIndex($columnName)
    {
        return array_search(strtoupper($columnName), range('A', 'Z'), false);
    }

    /**
     * Returns row index of the cell.
     * @param string|int $rowName Row name
     * @return int Row index
     */
    protected function getRowIndex($rowName)
    {
        return (int)$rowName - 1;
    }

    public function setSettings($settings) {}
}