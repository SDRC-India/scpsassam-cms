<?php

/**
 * Class SupsysticTablesPro_Exporter_Module
 */
class SupsysticTablesPro_Exporter_Module extends SupsysticTables_Core_BaseModule
{
    /**
     * {@inheritdoc}
     */
    public function onInit()
    {
        $this->setOverloadController(true);

        $this->loadPartials();
        $this->onAfterUiLoaded();
        $this->addExportFeature();

        $this->handleExportRequest();
    }

    /**
     * Returns the list of the supported export formats.
     * @return array
     */
    public function getSupportedFormats()
    {
        $dispatcher = $this->getEnvironment()->getDispatcher();

        return $dispatcher->apply(
            'supported-export-formats',
            array(
                array(
                    'CSV'        => 'csv',
                    'Excel 2007' => 'xls',
                    'PDF'        => 'pdf',
                    'Print'      => 'print'
                )
            )
        );
    }

    public function renderExportDialog()
    {
        $twig = $this->getEnvironment()->getTwig();

        $twig->display('@exporter/partials/export-dialog.twig');
    }

    public function renderExportFeatures($table)
    {
        $twig = $this->getEnvironment()->getTwig();
        $twig->display('@exporter/features/export.twig', array('table' => $table));
    }

    private function loadPartials()
    {
        $dispatcher = $this->getEnvironment()->getDispatcher();
        $dispatcher->on('tables-view-footer', array($this, 'renderExportDialog'));
    }

    private function onAfterUiLoaded()
    {
        if (!$this->getEnvironment()->isModule('tables', 'view')) {
            return;
        }

        $version = $this->getConfig()->get('plugin_version_pro');
        $location = untrailingslashit(plugin_dir_url(__FILE__));


        /** @var SupsysticTables_Ui_Module $ui */
        $ui = $this->getEnvironment()->getModule('ui');
        
        $ui->add(
            $ui->createStyle('supsystic-tables-shortcode-pro')
                ->setHookName('admin_enqueue_scripts')
                ->setExternalSource($location . '/assets/css/exporter.backend.css')
                ->setVersion($version)
        );

        $ui->add(
            $ui->createScript('jquery-ui-dialog')
                ->setHookName('admin_enqueue_scripts')
        );

        $ui->add(
            $ui->createScript('supsystic-tables-exporter-js')
                ->setHookName('admin_enqueue_scripts')
                ->setModuleSource($this, 'js/exporter.js')
                ->setVersion($version)
        );

        $ui->add(
            $ui->createScript('supsystic-tables-view-exporter-js')
                ->setHookName('admin_enqueue_scripts')
                ->setModuleSource($this, 'js/tables.view.exporter.js')
                ->setVersion($version)
        );
    }

    private function addExportFeature()
    {
        $dispatcher = $this->getEnvironment()->getDispatcher();
        $dispatcher->on('tables-view-features', array($this, 'renderExportFeatures'));
    }

    private function handleExportRequest()
    {
        if (!$this->getRequest()->query->has('export-supsystic-table')
			&& !$this->getRequest()->post->has('pdf-table-data')
		) {
            return;
        }

        $config = $this->getEnvironment()->getConfig();
        $path = $config->get('pro_modules_path');

        if ('pdf' === $this->getRequest()->query->get('type')
			&& !version_compare($phpVersion = phpversion(), '5.3.0', '>=')
		) {
            wp_die(
                sprintf(
                    $this->getEnvironment()->translate(
                        'PDF export requires PHP 5.3+, your version %s'
                    ),
                    $phpVersion
                )
            );
        }

        if (!class_exists('PHPExcel')) {
            require_once dirname(
                    $path
                ) . '/vendor/PHPOffice/PHPExcell/Classes/PHPExcel.php';
        }

        if (!class_exists('DOMPDF')) {
            require_once dirname(
                    $path
                ) . '/vendor/dompdf/dompdf_config.inc.php';
        }

        $this->getController()->export($this->getRequest());
    }
}
