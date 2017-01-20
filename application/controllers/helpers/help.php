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

    public function sendJsonResponseSuccess($data, $errorMsg)
    {
        if(!empty($data)){
            self::echoEncodedJson($data);
            $this->getResponse()->setHttpResponseCode(200);
        }else{
            self::echoEncodedJson(array("error" => $errorMsg));
            $this->getResponse()->setHttpResponseCode(400);
        }
    }

    public function sendJsonResponseError(Exception $exception){
        self::echoEncodedJson(array("error" => $exception->getMessage()));
        $this->getResponse()->setHttpResponseCode(400);
    }

    public static function echoEncodedJson($data)
    {
        echo Zend_Json::encode($data);
    }

}