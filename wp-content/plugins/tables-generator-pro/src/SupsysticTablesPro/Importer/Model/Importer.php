<?php


class SupsysticTablesPro_Importer_Model_Importer extends SupsysticTables_Core_BaseModel
{
    /**
     * Imports the file content to the table.
     * @param int $id Table id
     * @param array $file File info
     * @throws \SupsysticTablesPro_Importer_Exception_UnsupportedType
     * @throws \SupsysticTablesPro_Importer_Exception_Upload
     */
    public function import($id, array $file, $settings)
    {
        if ($file['error'] !== UPLOAD_ERR_OK) {
            switch ($file['error']) {
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    $message = $this->environment->translate(
                        'The uploaded file exceeds the max size of uploaded files.'
                    );
                    break;

                case UPLOAD_ERR_PARTIAL:
                    $message = $this->environment->translate(
                        'The uploaded file was only partially uploaded.'
                    );
                    break;
                case UPLOAD_ERR_NO_FILE:
                    $message = $this->environment->translate(
                        'No file was uploaded.'
                    );
                    break;
                case UPLOAD_ERR_NO_TMP_DIR:
                    $message = $this->environment->translate(
                        'Missing a temporary folder.'
                    );
                    break;
                case UPLOAD_ERR_CANT_WRITE:
                    $message = $this->environment->translate(
                        'Failed to write file to disk.'
                    );
                    break;
                default:
                    $message = $this->environment->translate(
                        'Unexpected error.'
                    );
            }

            throw new SupsysticTablesPro_Importer_Exception_Upload($message);
        }

        try {
            $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
            $importer = $this->createImporter($extension);
            $importer->setSettings($settings);
            $rows = $importer->import($file['tmp_name'], $extension);
            $this->updateTableRows($id, $rows, $settings);
        } catch (InvalidArgumentException $e) {
            throw new SupsysticTablesPro_Importer_Exception_UnsupportedType(
                $e->getMessage()
            );
        }
    }

    public function importSpreadheets($id, $settings)
    {
        //preg_match('/[\w-]{25,}/', $settings['url'], $matches);
        preg_match('/([\w-]{25,}).+#gid=(\d+)/', $settings['url'], $matches);
        if (empty($matches)) {
            throw new SupsysticTablesPro_Importer_Exception('Wrong spreadsheet id or url');
        }
        $spreadsheetId = $matches[1];
        $sheetId = $matches[2];
        //$url = "https://docs.google.com/spreadsheets/d/$spreadsheetId/export?exportFormat=xlsx";
        $url = "https://docs.google.com/spreadsheets/d/$spreadsheetId/export?format=xlsx&gid=$sheetId";

        if (!$file = @file_get_contents($url)) {
            $error = error_get_last();
            $errorMsg = substr($error['message'], strpos($error['message'], 'stream:') + 8);
            throw new SupsysticTablesPro_Importer_Exception($errorMsg);
        }

        try {
            $temp = tempnam(sys_get_temp_dir(), 'spreadsheet');
            $handler = fopen($temp, 'w+');
            fwrite($handler, $file);
            fclose($handler);

            $importer = new SupsysticTablesPro_Importer_Type_Xlsx();

			try {
				$rows = $importer->import($temp, 'xlsx');
			} catch (PHPExcel_Exception $e) {
				$message = strtolower($e->getMessage());

				throw new SupsysticTablesPro_Importer_Exception(
					"possible reason - $message Also, please, check the sharing settings of your spreadsheet: it must be accessed to edit for everyone who has link."
				);
			}

            $this->updateTableRows($id, $rows, $settings);
            unlink($temp);
        } catch (InvalidArgumentException $e) {
            throw new SupsysticTablesPro_Importer_Exception_UnsupportedType(
                $e->getMessage()
            );
        }
    }

    protected function createImporter($type)
    {
        $importer = null;

        switch (strtolower($type)) {
            case 'csv':
                $importer = new SupsysticTablesPro_Importer_Type_Csv();
                break;
            case 'xls':
            case 'xlsx':
                $importer = new SupsysticTablesPro_Importer_Type_Xlsx();
                break;
            default:
                throw new InvalidArgumentException(
                    sprintf(
                        $this->environment->translate(
                            'Unsupported file type "%s".'
                        ),
                        $type
                    )
                );
        }

        return $importer;
    }

    protected function updateTableRows($id, array $rows, $settings = array())
    {
        /** @var SupsysticTables_Core_Module $core */
        $core = $this->environment->getModule('core');
        $factory = $core->getModelsFactory();
        /** @var SupsysticTables_Tables_Model_Tables $tables */
        $tables = $factory->get('tables');
        $columnsWidth = array();
		$remove = isset($settings['append_data']) && $settings['append_data'] ? false : true;
        $tables->setRows($id, $rows, $remove);

        $meta = $tables->getById($id)->meta;
        
        foreach ($rows[0]['cells'] as $cell) {
            $columnsWidth[] = $cell['width'];
        }

        $meta['columnsWidth'] = $columnsWidth;
        $tables->setMeta($id, $meta);
    }
}

