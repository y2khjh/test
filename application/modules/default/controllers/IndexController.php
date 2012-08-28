<?php
require_once 'Zend/Controller/Action.php';

class IndexController extends Zend_Controller_Action
{
    public function indexAction()
    {
        var_dump($this->_helper->layout);exit;
        #$this->_helper->layout->setLayout('default');
    }
}