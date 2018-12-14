<?php

class SupsysticTablesPro_Core_Module extends SupsysticTables_Core_Module
{
    public function onInit()
    {
        parent::onInit();

        $this->update();
    }

    public function update() {

        if (!is_admin()) {
            return;
        }

        $environment = $this->getEnvironment();
        $config = $environment->getConfig();
        $oldVersion = get_option('st_plugin_version_pro');

        if (version_compare($config->get('plugin_version_pro'), 
            $oldVersion, '<=')) {
            return;
        }

        $core = $this->getModelsFactory()->get('core');
        $updatesDirectory = dirname(__FILE__) . '/updates';
        $updates = array_diff(scandir($updatesDirectory), array('..', '.'));

        foreach($updates as $filename) {
            $version = str_replace('.sql', '', $filename);
            if (
                version_compare(
                    $config->get('plugin_version_pro'), 
                    $version, '>='
                ) && 
                version_compare(
                    $oldVersion, 
                    $version, '<'
                )
            ) {
                try {
                    $core->updateFromFile($updatesDirectory . '/' . $filename);
                } catch (Exception $e) {
                    if (!$environment->isPluginPage()) {
                        return;
                    }
                    wp_die(sprintf(
                        'Failed to update plugin database. Reason: %s',
                        $e->getMessage()
                    ));
                }
            }
        }

        update_option(
            'st_plugin_version_pro', 
            $config->get('plugin_version_pro')
        );
    }
}
