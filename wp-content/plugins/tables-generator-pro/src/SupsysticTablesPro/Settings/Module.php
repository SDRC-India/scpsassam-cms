<?php


class SupsysticTablesPro_Settings_Module extends SupsysticTables_Settings_Module
{
    public function onInit()
    {
        parent::onInit();
        $this->setOverloadController(true);
                $environment = $this->getEnvironment();
        $menu = $environment->getMenu();
    }

    public function getTemplatesAliases()
    {
        return array(
            'settings.index' => '@settings_pro/index.twig'
        );
    }
}