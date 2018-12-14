<?php

/**
 * Plugin Name: Data Tables Generator PRO by Supsystic
 * Plugin URI: http://supsystic.com
 * Description: Create and manage beautiful data tables with custom design. No HTML knowledge is required
 * Version: 1.2.7
 * Author: supsystic.com
 * Author URI: http://supsystic.com
 */
require_once(dirname(__FILE__). DIRECTORY_SEPARATOR. 'loader.php');
require_once(dirname(__FILE__). DIRECTORY_SEPARATOR. 'wpUpdater.php');
require_once(dirname(__FILE__). DIRECTORY_SEPARATOR. 'SupsysticTablesUpdater.php');

$loader = new SupsysticTablesPro_Loader();
$loader->setProVersion('1.2.7');
$loader->setPrefix('SupsysticTablesPro');
$loader->setPath(dirname(__FILE__) . '/src');
$loader->load();