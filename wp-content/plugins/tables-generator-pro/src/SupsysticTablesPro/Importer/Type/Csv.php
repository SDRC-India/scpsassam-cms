<?php

/**
 * Class SupsysticTablesPro_Importer_Type_Csv
 */
class SupsysticTablesPro_Importer_Type_Csv implements SupsysticTablesPro_Importer_Interface
{
    /**
     * {@inheritdoc}
     */
    public function import($fileName)
    {
        $result = array();
        $reader = PHPExcel_IOFactory::createReader('CSV');
        $reader->setDelimiter($this->settings->get('delimeter', ','));
        $reader->setReadDataOnly(true);
        $excel = $reader->load($fileName);

        $sheet = $excel->getActiveSheet();
        $rows = $sheet->getRowIterator();

        foreach ($rows as $row) {
            $cells = $row->getCellIterator();
            $cells->setIterateOnlyExistingCells(false);

            /** @var PHPExcel_Cell $cell */
            foreach ($cells as $cell) {
                $row = $this->getRowIndex($cell->getRow());
                $col = $this->getColumnIndex($cell->getColumn());

                if (!array_key_exists($row, $result)) {
                    $result[$row] = array('cells' => array(), 'height' => null);
                }

                $result[$row]['cells'][$col] = array(
                    'data'  => stripslashes($cell->getValue()),
                    'meta'  => array(),
                    'width' => null,
                );
            }
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

    public function setSettings($settings) {
        $this->settings = new Rsc_Common_Collection($settings);
    }
}