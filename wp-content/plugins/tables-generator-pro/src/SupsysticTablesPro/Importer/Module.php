<?php

/**
 * Class SupsysticTablesPro_Importer_Module
 */
class SupsysticTablesPro_Importer_Module extends SupsysticTables_Core_BaseModule
{
    public function onInit()
    {
        parent::onInit();

        $this->addImportDialog();
        $this->onAfterUiLoaded();
    }

    public function renderDialog()
    {
        $twig = $this->getEnvironment()->getTwig();
        $twig->display('@importer/partials/import-dialog.twig', array(
            'table_id' => $this->getRequest()->query->get('id')
        ));
    }

    private function addImportDialog()
    {
        $dispatcher = $this->getEnvironment()->getDispatcher();
        $dispatcher->on('tables-view-footer', array($this, 'renderDialog'));
    }

    private function onAfterUiLoaded()
    {
        if (!$this->getEnvironment()->isModule('tables', 'view')) {
            return;
        }

        /** @var SupsysticTables_Ui_Module $ui */
        $ui = $this->getEnvironment()->getModule('ui');

        $ui->add(
            $ui->createScript('supsystic-tables-import-js')
                ->setHookName('admin_enqueue_scripts')
                ->setModuleSource($this, 'js/importer.js')
                ->setVersion('1.0')
        );
    }
}