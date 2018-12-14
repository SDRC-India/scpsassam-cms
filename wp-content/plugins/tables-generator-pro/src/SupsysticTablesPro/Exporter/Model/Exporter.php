<?php


class SupsysticTablesPro_Exporter_Model_Exporter extends SupsysticTables_Core_BaseModel
{
    public function export($type, array $data)
    {
        $exporter = $this->createExporter($type);
        $exporter->export($data);
    }

    protected function createExporter($type)
    {
        $exporter = null;

        switch (strtolower($type)) {
            case 'csv':
                $exporter = new SupsysticTablesPro_Exporter_Type_Csv();
                break;
            case 'xls':
                $exporter = new SupsysticTablesPro_Exporter_Type_Xlsx();
                break;
            case 'pdf':
                $resolver = $this->environment->getResolver();
                $module = $resolver->getModulesList()->get('exporter');
                $path = dirname(dirname(dirname($module->getLocation()))) . '/vendor/dompdf';

                $exporter = new SupsysticTablesPro_Exporter_Type_Pdf($path);
                break;
            default:
                throw new SupsysticTablesPro_Exporter_Exception(
                    sprintf(
                        $this->environment->translate(
                            'Unsupported export type: %s.'
                        ),
                        $type
                    )
                );
        }

        return $exporter;
    }
}