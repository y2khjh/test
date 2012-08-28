<?php
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

require_once 'Zend/Controller/Front.php';
#require_once 'Zend/Controller/Router/Rewrite.php';

#$router = new Zend_Controller_Router_Rewrite();

$front = Zend_Controller_Front::getInstance();
#$front->setParam('noViewRenderer', true);

$front->setControllerDirectory(array(
    'default' => APPLICATION_PATH . '/modules/default/controllers',
    'user' => APPLICATION_PATH . '/modules/user/controllers',
));
#$front->setControllerDirectory(APPLICATION_PATH .'/modules/webservice/controllers', 'webservice');

#$front->setRouter($router);
#$front->setParam('useDefaultControllerAlways', true);
$response = $front->dispatch();
#Zend_Controller_Front::run(APPLICATION_PATH . '/controllers');
