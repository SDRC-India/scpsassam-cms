<?php


class SupsysticTablesPro_Tables_Module extends SupsysticTables_Tables_Module
{
	private $useEditableFields = array();

	public function onInit()
    {
        add_action('wp_enqueue_scripts', array($this, 'loadProAssets'));
        $this->setOverloadController(true);
        parent::onInit();

        $this->renderToolbar();
		$this->addEditableFieldsFeature();

    }

    public function render($id) {
		$use_editable_fields = $this->checkEditableFieldsAbility($id);
		$this->useEditableFields[$id] = $use_editable_fields;
		wp_localize_script('frontend.pro.js', 'editableFields', $this->useEditableFields);
		wp_enqueue_script('frontend.pro.js');

        return parent::render($id);
    }

	public function checkEditableFieldsAbility($id)
	{
		return $this->getController()->checkEditableFieldsAbility($id);
	}

    public function loadProAssets() {
        $version = $this->getConfig()->get('plugin_version_pro');
        wp_register_script(
            'frontend.pro.js', 
            $this->getProLocationUrl() . '/assets/js/frontend.pro.js',
            array('tables-core', 'supsystic-tables-shortcode'),
            $version,
            true);
        wp_localize_script('frontend.pro.js', 'rulejsLibraries', array(
            'libs' => $this->getLocationUrl() . '/assets/libraries/ruleJS/ruleJS.lib.full.js',
            'parser' => $this->getLocationUrl() . '/assets/libraries/ruleJS/parser.js',
            'rulejs' => $this->getLocationUrl() . '/assets/libraries/ruleJS/ruleJS.js',
        ));
    }

    public function afterUiLoaded(SupsysticTables_Ui_Module $ui)
    {
        parent::afterUiLoaded($ui);
        $version = $this->getConfig()->get('plugin_version_pro');
        $ui->add(
            $ui->createStyle('supsystic-tables-shortcode-pro')
                ->setHookName('wp_enqueue_scripts')
                ->setExternalSource($this->getProLocationUrl() . '/assets/css/shortcode-pro.css')
                ->setVersion($version)
        );
        if ($this->isModule('tables', 'view')) {
            $ui->add(
                $ui->createScript('backend.view.js')
                ->setHookName('admin_enqueue_scripts')
                ->setExternalSource($this->getProLocationUrl() . '/assets/js/backend.view.js')
                ->setVersion($version)
            );
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getShortcodeTemplate()
    {
        return '@tables_pro/shortcode.twig';
    }

    /**
     * Returns the URL to the PRO version of the module.
     * @return string
     */
    public function getProLocationUrl()
    {
        return untrailingslashit(plugin_dir_url(__FILE__));
    }

    private function renderToolbar()
    {
        $this->getDispatcher()->on('toolbar_rendered', array($this, 'afterToolbarRendered'));
    }

    public function afterToolbarRendered(stdClass $table) {
        $this->getTwig()->display(
            '@tables_pro/partials/toolbar.twig',
            array('table' => $table)
        );
    }
	private function addEditableFieldsFeature()
	{
		$dispatcher = $this->getEnvironment()->getDispatcher();
		$dispatcher->on('tables-view-features', array($this, 'renderEditableFieldsFeatures'));
	}
	public function renderEditableFieldsFeatures($table)
	{
		$twig = $this->getEnvironment()->getTwig();
		$twig->display('@tables_pro/features/editableFields.twig', array('table' => $table));
	}
}