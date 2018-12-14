<?php


class SupsysticTablesPro_Importer_Controller extends SupsysticTables_Core_BaseController
{
    /**
     * @param \Rsc_Http_Request $request
     * @return \Rsc_Http_Response
     */
    public function importAction(Rsc_Http_Request $request)
    {
        $config = $this->getEnvironment()->getConfig();
        $path = $config->get('pro_modules_path');
        $settings = $request->post->get('settings', array());
        $extension = $request->post->get('extension');

        if (!class_exists('PHPExcel')) {
            require_once dirname(
                    $path
                ) . '/vendor/PHPOffice/PHPExcell/Classes/PHPExcel.php';
        }

        $id = $request->post->get('id');
        $file = $request->files->get('file');
        $importer = $this->getImporter();
        
        try {

            if ($extension == 'spreadsheets') {
                $importer->importSpreadheets($id, $settings);
            } else {
                $importer->import($id, $file, $settings);
            }

        } catch (SupsysticTablesPro_Importer_Exception_Upload $e) {
            return $this->response(
                '@importer/upload_error.twig',
                array('error' => $e)
            );
        } catch (SupsysticTablesPro_Importer_Exception_UnsupportedType $e) {
            return $this->response(
                '@importer/unsupported_type_error.twig',
                array('error' => $e)
            );
        } catch (SupsysticTablesPro_Importer_Exception $e) {
            return $this->response(
                '@importer/error.twig',
                array('error' => $e)
            );
        }

        return $this->redirect(
            $this->generateUrl('tables', 'view', array('id' => $id))
        );
    }

    /**
     * @return SupsysticTablesPro_Importer_Module
     */
    protected function getModule()
    {
        $resolver = $this->getEnvironment()->getResolver();

        return $resolver->getModulesList()->get('importer');
    }

    /**
     * @return \SupsysticTablesPro_Importer_Model_Importer
     */
    protected function getImporter()
    {
        /** @var SupsysticTables_Core_Module $core */
        $core = $this->getEnvironment()->getModule('core');
        $factory = $core->getModelsFactory();

        return $factory->get('importer', $this->getModule());
    }
}