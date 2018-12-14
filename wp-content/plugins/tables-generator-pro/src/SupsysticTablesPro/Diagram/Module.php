<?php

/**
 * Class SupsysticTablesPro_Diagram_Module
 */
class SupsysticTablesPro_Diagram_Module extends SupsysticTables_Diagram_Module
{
	/**
	 * {@inheritdoc}
	 */
	public function onInit()
	{
		parent::onInit();

		$this->setOverloadController(true);

		$this->loadShortcodeConfig();

		$this->loadAssets();
		$this->renderToolbar();
		$this->filterDiagramsContentTemplate();
		$this->filterDiagramsContentData();
		$this->registerDiagramPreviewDialog();
		$this->addShortcode();
	}

	/**
	 * {@inheritdoc}
	 */
	public function getLocationUrl()
	{
		return plugin_dir_url(__FILE__);
	}

	/**
	 * Loads the assets
	 * @param \SupsysticTables_Ui_Module $ui
	 */
	public function afterUiLoaded(SupsysticTables_Ui_Module $ui)
	{
		parent::afterUiLoaded($ui);


		if ($this->isPluginPage()) {
			$this->loadingAssets($ui);
		}
	}

	function loadingAssets($ui) {

		$config = $this->getEnvironment()->getConfig();
		$userAgent = $this->getRequest()->headers->get('USER_AGENT');
		$hookName = is_admin() ? 'admin_enqueue_scripts' : 'wp_enqueue_scripts';
		$version = $config->get('plugin_version');

		$ui->add($ui->createScript('jquery')->setHookName($hookName));

		if ($this->getEnvironment()->isModule('tables', 'view')) {

			$prefix = 'st-diagram-jqplot-';
			$ui->add(
				$ui->createStyle($prefix . 'jqplot-css')
					->setHookName('wp_enqueue_scripts')
					->setModuleSource($this, 'js/jqplot/jquery.jqplot.min.css')
					->setVersion('1.0.8')
			);

			// Load excanvas.js only if browser version < IE9
			if ($userAgent && preg_match('/(?i)msie [6-8]/', $userAgent)) {
				$ui->add(
					$ui->createScript($prefix . 'jqplot-excanvas-ie')
						->setHookName($hookName)
						->setModuleSource($this, 'js/jqplot/excanvas.min.js')
				);
			}

			$ui->add(
				$ui->createScript($prefix . 'jqplot-js')
					->setHookName($hookName)
					->setModuleSource($this, 'js/jqplot/jquery.jqplot.min.js')
					->setVersion('1.0.8')
					->addDependency('jquery')
			);

			// Axis Labels Renderer
			$ui->add(
				$ui->createScript($prefix . 'jqplot-canvasTextRenderer-js')
					->setHookName($hookName)
					->setModuleSource($this, 'js/jqplot/plugins/jqplot.canvasTextRenderer.min.js')
					->setVersion('1.0.8')
					->addDependency('jquery')
			);

			$ui->add(
				$ui->createScript($prefix . 'jqplot-canvasAxisLabelRenderer-js')
					->setHookName($hookName)
					->setModuleSource($this, 'js/jqplot/plugins/jqplot.canvasAxisLabelRenderer.min.js')
					->setVersion('1.0.8')
					->addDependency('jquery')
			);

			$ui->add(
				$ui->createScript($prefix . 'jqplot.highlighter-js')
					->setHookName($hookName)
					->setModuleSource($this, 'js/jqplot/plugins/jqplot.highlighter.min.js')
					->setVersion('1.0.8')
					->addDependency('jquery')
			);

			$ui->add(
				$ui->createScript($prefix . 'jqplot-canvasAxisLabelRenderer-js')
					->setHookName($hookName)
					->setModuleSource($this, 'js/jqplot/plugins/jqplot.canvasAxisLabelRenderer.min.js')
					->setVersion('1.0.8')
					->addDependency('jquery')
			);

			$ui->add(
				$ui->createStyle($prefix . 'jqplot-css')
					->setHookName($hookName)
					->setModuleSource($this, 'js/jqplot/jquery.jqplot.min.css')
					->setVersion('1.0.8')
			);

			$ui->add(
				$ui->createScript($prefix . 'charts-js')
					->setHookName($hookName)
					->setModuleSource($this, 'js/charts.js')
			);

			$ui->add(
				$ui->createScript($prefix . 'diagram-js')
					->setHookName('admin_enqueue_scripts')
					->setModuleSource($this, 'js/tables.view.diagram.js')
					->setVersion($version)
					->addDependency('jquery')
					->addDependency('supsystic-tables-tables-view')
			);

			$ui->add(
				$ui->createStyle($prefix . 'diagram-css')
					->setHookName('admin_enqueue_scripts')
					->setModuleSource($this, 'diagrams.css')
			);
		}

		$ui->add(
			$ui->createScript('st-diagram-jsapi')
				->setHookName($hookName)
				->setSource('https://www.gstatic.com/charts/loader.js')
		);

		$ui->add(
			$ui->createScript('st-diagram-frontend-js')
				->setHookName('wp_enqueue_scripts')
				->setModuleSource($this, 'js/frontend.js')
				->addDependency('st-diagram-jsapi')
		);
	}

	/**
	 * Renders the "Add Diagram" toolbar button.
	 * @param stdClass $table Current table
	 */
	public function afterToolbarRendered(stdClass $table)
	{
		$twig = $this->getEnvironment()->getTwig();
		$twig->display(
			'@diagram_pro/partials/toolbar.twig',
			array('table' => $table)
		);
	}

	/**
	 * Returns new tab content template.
	 * @return string
	 */
	public function onDiagramsTabsContentTemplate()
	{
		return '@diagram_pro/partials/tabContent.twig';
	}

	/**
	 * Adds the diagrams variable to the template for PRO version.
	 * @param array $data Template data
	 * @return array
	 */
	public function onDiagramsTabsContentData(array $data = array())
	{
		if (!array_key_exists('table', $data) || !is_object($data['table'])) {
			return $data;
		}

		$diagrams = $this->getDiagramsModel();
		$data['diagrams'] = $diagrams->getByTableId($data['table']->id);

		return $data;
	}

	/**
	 * Renders the diagram.
	 * @param array $attributes An array of the shortcode attributes
	 * @return string|void
	 */
	public function doShortcode(array $attributes = array())
	{
		$environment = $this->getEnvironment();
		$diagrams = $this->getDiagramsModel();

		if (!array_key_exists('id', $attributes)) {
			return $environment->translate(
				'Mandatory attribute ID is not specified.'
			);
		}

		$diagram = $diagrams->getById((int)$attributes['id']);

		if (null === $diagram) {
			return sprintf(
				$environment->translate('Failed to find diagram %s.'),
				$attributes['id']
			);
		}

		$chartData = array();
		$chartType = 'google';

		if (!$diagram->data) {

			$chartType = 'jqplot';

			$tables = $this->getTablesModel();
			$table = $tables->getById((int)$diagram->table_id);
			$table->rows = $tables->getRows($diagram->table_id);

			if (null === $table) {
				return sprintf(
					$environment->translate('Failed to find table %s.'),
					$attributes['id']
				);
			}

			$from = array('row' => $diagram->start_row, 'col' => $diagram->start_col);
			$to = array('row' => $diagram->end_row, 'col' => $diagram->end_col);

			$chartData['selection'] = array(
				'from' => $from,
				'to' => $to,
			);

			$chartData['width'] = $this->getValidAttribute('width', $attributes);
			$chartData['height'] = $this->getValidAttribute('height', $attributes);

			$chartData['rangeData'] = $diagrams->getSelectedRange(
				$table->rows,
				$from,
				$to
			);

			$chartData = json_encode($chartData);
		} else {
			$chartData = $diagram->data;
			$decodeChartData = json_decode($chartData);

			if(isset($decodeChartData->table_id)) {
				$chartWidth = isset($decodeChartData->options->chart_width) ? $decodeChartData->options->chart_width : '';
				$chartHeight = isset($decodeChartData->options->chart_height) ? $decodeChartData->options->chart_height : '';
				if($chartWidth && strpos($chartWidth, '%') != strlen($chartWidth) - 1 && strpos($chartWidth, 'px') != strlen($chartWidth) - 2){
					$chartWidth = trim($chartWidth) . 'px';
				}
				if($chartHeight && strpos($chartHeight, '%') != strlen($chartHeight) - 1 && strpos($chartHeight, 'px') != strlen($chartHeight) - 2){
					$chartHeight = trim($chartHeight) . 'px';
				}

				$newRangeData = $this->getNewRenderData($decodeChartData/*, $attributes['id']*/);
				$decodeChartData->rangeData = $newRangeData;
				$chartData = json_encode($decodeChartData);
			}
			$chartData = html_entity_decode($chartData);
		}

		$ui = $environment->getModule('ui');
		$this->loadingAssets($ui);
		$assets = array_filter($ui->getAssets(), array($this, 'filterAssets'));

		if (count($assets) > 0) {
			foreach ($assets as $asset) {

				if ($chartType !== 'jqplot' &&
					strpos($asset->getHandle(), 'st-diagram-jqplot') !== false) {
					continue;
				}

				if ($asset instanceof SupsysticTables_Ui_Script) {
					wp_enqueue_script(
						$asset->getHandle(),
						$asset->getSource(),
						$asset->getDependencies(),
						$asset->getVersion(),
						true
					);
				}
				if ($asset instanceof SupsysticTables_Ui_Style) {
					wp_enqueue_style(
						$asset->getHandle(),
						$asset->getSource(),
						$asset->getDependencies(),
						$asset->getVersion(),
						$asset->getMedia()
					);
				}
			}
		}

		$twig = $environment->getTwig();

		return $twig->render(
			'@diagram_pro/shortcode.twig',
			array(
				'id'        => $diagram->id,
				'chartData' => $chartData,
				'chartType' => $chartType,
				'chartWidth' => isset($chartWidth) && !empty($chartWidth) ? $chartWidth : 'auto',
				'chartHeight' => isset($chartHeight) && !empty($chartHeight) ?  $chartHeight : '100%',
			)
		);
	}

	public function getNewRenderData($data/*, $id = 0*/) {	// $id needs for debug
		$rowsData = array();
		$rowFrom = $data->selection->from->row;
		$rowTo = $data->selection->to->row;
		$colFrom = $data->selection->from->col;
		$colTo = $data->selection->to->col;

		if($data->selection->from->row > $data->selection->to->row) {
			$rowFrom = $data->selection->to->row;
			$rowTo = $data->selection->from->row;
		}
		if($data->selection->from->col > $data->selection->to->col) {
			$colFrom = $data->selection->to->col;
			$colTo = $data->selection->from->col;

		}
		try {
			$rows = $this->getTablesModel()->getRows($data->table_id);
		} catch (Exception $e) {
			return $this->ajaxError(
				sprintf($this->translate('Failed to get table rows: %s'), $e->getMessage())
			);
		}
		for($i = $rowFrom; $i <= $rowTo; $i++) {
			$rowData = array();

			if(isset($rows[$i])) {
				for($j = $colFrom; $j <= $colTo; $j++) {
					if(isset($rows[$i]['cells'][$j]) && isset($rows[$i]['cells'][$j]['data'])) {
						if(strpos($rows[$i]['cells'][$j]['data'], '=') === 0) {
							// To pevent some kind of errors during displaying diagrams on frontend
							if ($rows[$i]['cells'][$j]['calculatedValue'] && is_numeric($rows[$i]['cells'][$j]['calculatedValue'])) {
								$rowData[] = (float) trim($rows[$i]['cells'][$j]['calculatedValue']);
							} else {
								$rowData[] = trim($rows[$i]['cells'][$j]['calculatedValue']);
							}
						} else {
							$rowData[] = trim($rows[$i]['cells'][$j]['data']);
						}
					}
				}
				$rowsData[] = $rowData;
			}
		}
		if(!empty($data->params->switchRowsColumns)) {
			$newRangeData = $this->formatRows($rowsData, $data);
		} else {
			$newRangeData = $this->formatColumns($rowsData, $data);
		}
		//if($id == 11) {
			//echo '<pre>';
			//var_dump($rowsData);
			//exit;
		//}
		return $newRangeData;
	}

	public function formatHeaders($data, $chartData) {
		if(!empty($data)) {
			if (!isset($chartData->params->switchRowsColumns) || !$chartData->params->switchRowsColumns) {
				// Headers
				if (!isset($chartData->params->useFirstRow) || !$chartData->params->useFirstRow) {
					$array_map = false;
					if (!empty($data[0]) && is_array($data[0])) {
						for ($i = 0; $i < count($data[0]); $i++) {
							if (is_numeric($data[0][$i])) {
								$array_map = true;
								break;
							}
						}
					}
					if ($array_map) {
						$empty_array = array();

						if (!empty($data[0])) {
							for ($i = 0; $i < count($data[0]); $i++) {
								array_push($empty_array, '');
							}
							array_unshift($data, $empty_array);
						}
					}

				} else {
					if (!empty($data[0])) {
						for ($i = 0; $i < count($data[0]); $i++) {
							$data[0][$i] = (string) $data[0][$i];
						}
					}
				}
				// Labels
				if (!isset($chartData->params->useFirstColumn) || !$chartData->params->useFirstColumn) {
					for ($i = 0; $i < count($data); $i++) {
						if (!empty($data[$i]) && is_numeric($data[$i][0])) {
							for ($i = 0; $i < count($data); $i++) {
								array_unshift($data[$i], '');
							}
							break;
						}
					}
				} else {
					for ($i = 0; $i < count($data); $i++) {
						$data[$i][0] = (string) $data[$i][0];
					}
				}
			} else {
				// Labels
				if (isset($chartData->params->useFirstRow) && $chartData->params->useFirstRow) {
					if (!empty($data[0])) {
						for ($i = 0; $i < count($data[0]); $i++) {
							$data[0][$i] = (string) $data[0][$i];
						}
					}
				} else {
					if (!empty($data[1]) && !empty($data[1][0]) && !is_string($data[1][0])) {
						for ($i = 0; $i < count($data); $i++) {
							array_unshift($data[$i], '');
						}
					}
				}
				// Headers
				if (!isset($chartData->params->useFirstColumn) || !$chartData->params->useFirstColumn) {
					if (!empty($data[0]) && is_array($data[0])) {
						for ($i = 0; $i < count($data[0]); $i++) {
							if (!is_numeric($data[0][$i])) {
								for ($j = 0; $j < count($data[0]); $j++) {
									$data[0][$j] = '';
								}
								break;
							}
						}
					}
				} else {
					if (!empty($data[0])) {
						for ($i = 0; $i < count($data[0]); $i++) {
							$data[0][$i] = (string) $data[0][$i];
						}
					}
				}
			}

			if (!empty($data[0]) && count($data[0]) < 2) {
				$empty_array = array();

				for ($i = 0; $i < count($data[0]); $i++) {
					array_push($empty_array, '');
				}
				array_unshift($data, $empty_array);
			}
		}
		//echo '<pre>';
		//print_r($data);
		return $data;
	}

	public function formatColumns($dataColumns, $chartData) {
		if (!is_array($dataColumns[0])) {
			for ($i = 0; $i < count($dataColumns); $i++) {
				$dataColumns[$i] = array($dataColumns[$i]);
			}
		}

		for ($i = 0; $i < count($dataColumns); $i++) {
			for ($j = 0; $j < count($dataColumns[$i]); $j++) {
				if ($dataColumns[$i][$j] && is_numeric($dataColumns[$i][$j])) {
					$dataColumns[$i][$j] = (float) $dataColumns[$i][$j];
				}
			}
		}

		return $this->formatHeaders($dataColumns, $chartData);
	}

	public function formatRows($dataRows, $chartData)
	{
		$dataTemp = array();

		if (!is_array($dataRows[0])) {
			for($i = 0; $i < count($dataRows); $i++) {
				$dataRows[$i] = array($dataRows[$i]);
			}
		}

		for ($i = 0; $i < count($dataRows); $i++) {
			for ($j = 0; $j < count($dataRows[$i]); $j++) {
				$dataTemp[$j] = isset($dataTemp[$j]) ? $dataTemp[$j] : array();
				$dataTemp[$j][$i] = isset($dataTemp[$j][$i]) ? $dataTemp[$j][$i] : array();

				if ($dataRows[$i][$j] && is_numeric($dataRows[$i][$j])) {
					$dataTemp[$j][$i] = (float) $dataRows[$i][$j];
				} else {
					$dataTemp[$j][$i] = $dataRows[$i][$j];
				}
			}
		}

		return $this->formatHeaders($dataTemp, $chartData);
	}

	/**
	 * Returns only not loaded assets
	 * @param \SupsysticTables_Ui_Asset $asset
	 * @return bool
	 */
	public function filterAssets(SupsysticTables_Ui_Asset $asset)
	{
		return !$asset->isLoaded() &&
		'wp_enqueue_scripts' === $asset->getHookName() &&
		(strpos($asset->getHandle(), 'st-diagram') !== false);
	}

	/**
	 * Wait after UI loads and starting to load required module assets.
	 */
	private function loadAssets()
	{
		/** @var SupsysticTables_Ui_Module $ui */
		$ui = $this->getEnvironment()->getModule('ui');

		if (null === $ui) {
			$dispatcher = $this->getEnvironment()->getDispatcher();
			$dispatcher->on('after_ui_loaded', array($this, 'afterUiLoaded'));

			return;
		}

		$this->afterUiLoaded($ui);
	}

	/**
	 * Runs the afterToolbarRendered() method after table editor toolbar rendered.
	 */
	private function renderToolbar()
	{
		$dispatcher = $this->getEnvironment()->getDispatcher();
		$dispatcher->on('toolbar_rendered', array($this, 'afterToolbarRendered'));
	}

	/**
	 * Adds the shortcode to render diagrams.
	 */
	private function addShortcode()
	{
		$config = $this->getEnvironment()->getConfig();

		add_shortcode(
			$config->get('diagram_shortcode_name'),
			array($this, 'doShortcode')
		);
	}

	/**
	 * @return \SupsysticTables_Core_ModelsFactory
	 */
	private function getModelsFactory()
	{
		/** @var SupsysticTables_Core_Module $core */
		$core = $this->getEnvironment()->getModule('core');

		return $core->getModelsFactory();
	}

	/**
	 * @return \SupsysticTablesPro_Diagram_Model_Diagrams
	 */
	private function getDiagramsModel()
	{
		return $this->getModelsFactory()->get('diagrams', 'diagram');
	}

	/**
	 * @return \SupsysticTables_Tables_Model_Tables
	 */
	private function getTablesModel()
	{
		return $this->getModelsFactory()->get('tables', 'tables');
	}

	/**
	 * Adds the module to the config loader and loads shortcode config.
	 */
	private function loadShortcodeConfig()
	{
		$config = $this->getEnvironment()->getConfig();
		$loader = $config->getLoader();
		$loader->add(
			plugin_dir_path(__FILE__) . 'configs',
			$this->getModuleName()
		);

		$shortcode = $loader->load('@diagram/shortcode.php');

		if (!is_array($shortcode) || count($shortcode) === 0) {
			return;
		}

		foreach ($shortcode as $key => $value) {
			$config->add('diagram_shortcode_' . $key, $value);
		}
	}

	/**
	 * Adds filter to the tab content template.
	 */
	private function filterDiagramsContentTemplate()
	{
		$dispatcher = $this->getEnvironment()->getDispatcher();
		$dispatcher->on(
			'diagram_tabs_content_template',
			array($this, 'onDiagramsTabsContentTemplate')
		);
	}

	/**
	 * Adds the filter to the diagrams content tab.
	 * Filter adds the diagrams for the selected table.
	 */
	private function filterDiagramsContentData()
	{
		$dispatcher = $this->getEnvironment()->getDispatcher();
		$dispatcher->on(
			'diagram_tabs_content_data',
			array($this, 'onDiagramsTabsContentData')
		);
	}

	/**
	 * Returns value from the shortcode attribute or default value
	 * if shortcode attribute is not specified.
	 * @param string $attribute Attribute to search
	 * @param array $attributes An array of the shortcode attributes
	 * @return mixed
	 */
	private function getValidAttribute($attribute, array $attributes)
	{
		$config = $this->getEnvironment()->getConfig();
		$default = $config->get('diagram_shortcode_' . $attribute);
		$units = array('%', 'px', 'em', 'pt', 'cm', 'in');

		if (!array_key_exists($attribute, $attributes)) {
			return $default;
		}

		$value = $attributes[$attribute];

		foreach ($units as $unit) {
			if ($unit === strtolower(substr($value, -strlen($unit)))) {
				return $value;
			}
		}

		return $default;
	}

	private function registerDiagramPreviewDialog()
	{
		$dispatcher = $this->getEnvironment()->getDispatcher();
		$dispatcher->on(
			'tables-view-footer',
			array($this, 'renderDiagramPreviewDialog')
		);
	}


	public function renderDiagramPreviewDialog() {
		$twig = $this->getEnvironment()->getTwig();
		$twig->display('@diagram_pro/partials/previewDialog.twig');
	}
}