<?php

class ApiController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
        $this->_helper->viewRenderer->setNoRender(true);

        $this->_todo = array (
            "1" => "Buy milk",
            "2" => "Pour glass of milk",
            "3" => "Eat cookies"
        );

    }

    public function indexAction()
    {
        echo Zend_Json::encode($this->_todo);
        // action body
    }

    public function getAction()
    {
        echo Zend_Json::encode($this->_todo);
        // action body
    }

    public function postAction()
    {

        echo Zend_Json::encode(array(5,5,3,3,8,3,3,5));
        // action body
    }

    public function putAction()
    {
        echo Zend_Json::encode(array(5,5,5));
        // action body
    }

    public function deleteAction()
    {
        // action body
    }


}









