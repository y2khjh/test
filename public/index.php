<?php
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

require_once 'Zend/Registry.php';
require_once 'Zend/Config/Ini.php';
require_once 'Zend/Controller/Front.php';
require_once 'Zend/Layout.php';
#require_once 'Zend/Controller/Router/Rewrite.php';

$config = new Zend_Config_Ini(APPLICATION_PATH . '/configs/default.ini', APPLICATION_ENV);
Zend_Registry::set('config', $config);

#$router = new Zend_Controller_Router_Rewrite();

$front = Zend_Controller_Front::getInstance();
#$front->setParam('noErrorHandler', true);
#$front->setParam('noViewRenderer', true);

$front->setControllerDirectory(array(
    'default' => APPLICATION_PATH . '/modules/default/controllers',
    'user' => APPLICATION_PATH . '/modules/user/controllers',
));
#$front->setControllerDirectory(APPLICATION_PATH .'/modules/webservice/controllers', 'webservice');

#$front->setRouter($router);
#$front->setParam('useDefaultControllerAlways', true);
Zend_Layout::startMvc($config->resources->layout);
#Zend_Controller_Front::run(APPLICATION_PATH . '/controllers');
$response = $front->dispatch();
