<?php
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

require_once 'Zend/Controller/Front.php';
require_once 'Zend/Controller/Router/Rewrite.php';

$router = new Zend_Controller_Router_Rewrite();

$front = Zend_Controller_Front::getInstance();
#$front->setParam('noViewRenderer', true);

$front->setControllerDirectory(array(
    'client' => APPLICATION_PATH . '/modules/client/controllers',
    'admin' => APPLICATION_PATH . '/modules/admin/controllers',
));
$front->setControllerDirectory(APPLICATION_PATH .'/modules/webservice/controllers', 'webservice');
$front->setControllerDirectory(APPLICATION_PATH . '/controllers', 'default');

$front->setRouter($router);
$response = $front->dispatch();
#Zend_Controller_Front::run(APPLICATION_PATH . '/controllers');
