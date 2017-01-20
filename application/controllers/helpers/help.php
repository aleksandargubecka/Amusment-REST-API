<?php

class Zend_Controller_Action_Helper_Help extends Zend_Controller_Action_Helper_Abstract
{

    public $resposne = array(
        "response" => array(
            "code" => 200,
            "success" => true,
            "message" => ""
        ),
        "data" => array()
    );

    public function init()
    {
        echo '<pre>';
        var_dump(6);
        echo '</pre>';
    }

    public function postDispatch()
    {
        
    }

    public function preDispatch()
    {

    }

    public function formatRequestParams(&$requestParams)
    {
        unset($requestParams['controller']);
        unset($requestParams['action']);
        unset($requestParams['module']);

        return $requestParams;
    }

}