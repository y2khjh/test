<?php

class IndexController extends AppController
{
    protected $_userModel;

    public function init()
    {
        parent::init();
        $this->_userModel = new UserModel();
    }

    public function indexAction()
    {
        var_dump($this->_userModel->read());

        $this->view->me = 'Jack';
        $view = $this->_helper->layout->getView();
        //$view = new Zend_View();
        $view->title = 'test';
        $view->assign('description', 'how are "you"?');
        $tmp = array('surname'=>'He', 'givenname'=>'Jack');
        $view->assign($tmp);
        $front = Zend_Controller_Front::getInstance();
        $view->cd = $front->getControllerDirectory();
        //$view->baseUrl = $front->getBaseUrl();

        $request = $this->getRequest();
        if ($request->isGet())
        {
            $view->params = $request->getParams();
            //$this->_forward('create', null, null, array('id'=>'1234'));
        }

        //echo $view->render('index.phtml');
    }
}