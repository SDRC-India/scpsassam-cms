<?php


class SupsysticTablesPro_Exporter_Type_Xlsx implements SupsysticTablesPro_Exporter_Interface
{

    /**
     * Exports specified data.
     * @param array $data
     * @return mixed
     */
    public function export(array $data)
    {
        $letters = range('A', 'Z');
        $excel = new PHPExcel();
        $sheet = $excel->getActiveSheet();

        foreach ($data as $rowIndex => $row) {
			foreach ($row['cells'] as $colIndex => $cell) {
				$cellIndex = $letters[$colIndex] . ($rowIndex + 1);
				$cellValue = $cell['data'];

				$sheet->setCellValue($cellIndex, $cellValue);

				if(isset($cell['meta']) && !empty($cell['meta'])) {
					foreach($cell['meta'] as $meta) {
						$cellStyle = $sheet->getStyle($cellIndex);
						$cellFill = $cellStyle->getFill();
						$cellFont = $cellStyle->getFont();
						$cellAlignment = $cellStyle->getAlignment();

						if(preg_match('/bg\-([0-9abcdef]{6})/', $meta, $matches)) {
							$color = new PHPExcel_Style_Color($matches[1]);
							$cellFill->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
							$cellFill->setStartColor($color);
						};
						if(preg_match('/color\-([0-9abcdef]{6})/', $meta, $matches)) {
							$color = new PHPExcel_Style_Color($matches[1]);
							$cellFont->setColor($color);
						};
						switch($meta) {
							case 'bold':
								$cellFont->setBold(true);
								break;
							case 'italic':
								$cellFont->setItalic(true);
								break;
							case 'htCenter':
								$cellAlignment->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
								break;
							case 'htLeft':
								$cellAlignment->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
								break;
							case 'htRight':
								$cellAlignment->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
								break;
							case 'htTop':
								$cellAlignment->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
								break;
							case 'htMiddle':
								$cellAlignment->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
								break;
							case 'htBottom':
								$cellAlignment->setVertical(PHPExcel_Style_Alignment::VERTICAL_BOTTOM);
								break;
						}
					}
				}
			}
		}

        /** @var PHPExcel_Writer_CSV $writer */
        $writer = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        try {
            $writer->save('php://output');
        } catch (Exception $e) {
            $upload_dir = wp_upload_dir();
            if (!$upload_dir['error']) {
                $filename = trailingslashit($upload_dir['basedir']) . 'temp.xls';
                $writer->save($filename);
            }
            readfile($filename);
            unlink($filename);
        }
    }
}