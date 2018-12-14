<?php


class SupsysticTablesPro_Exporter_Type_Csv implements SupsysticTablesPro_Exporter_Interface
{
    /**
     * Exports specified data.
     * @param array $data
     * @return mixed
     * @throws \SupsysticTablesPro_Exporter_Exception
     */
    public function export(array $data)
    {
        $letters = range('A', 'Z');
        $excel = new PHPExcel();
        $sheet = $excel->getActiveSheet();

        foreach ($data as $rowIndex => $row) {
            foreach ($row['cells'] as $colIndex => $cell) {
                $sheet->setCellValue($letters[$colIndex] . ($rowIndex + 1), addslashes($cell['data']));
            }
        }

        /** @var PHPExcel_Writer_CSV $writer */
        $writer = PHPExcel_IOFactory::createWriter($excel, 'CSV');
        $writer->save('php://output');
    }
}