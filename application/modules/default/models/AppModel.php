<?php

abstract class AppModel
{
    protected $_config;
    protected $_db;

    public function __construct()
    {
        $this->_config = Zend_Registry::get('config');
        $this->_db = Zend_Db::factory($this->_config->database);
    }

}