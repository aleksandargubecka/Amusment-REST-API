<?php

class CommentsController extends Zend_Controller_Action
{

    public function init()
    {
        $this->_helper->viewRenderer->setNoRender(true);
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        $commentsMapper = new Application_Model_CommentsMapper();
        try {
            $events = $commentsMapper->fetchAll();
            if(count($events) > 0){
                echo Zend_Json::encode($events);
                $this->getResponse()->setHttpResponseCode(200);
            }else{
                echo Zend_Json::encode(array("error" => "No data found."));
                $this->getResponse()->setHttpResponseCode(400);
            }
        } catch (Exception $e) {
            echo Zend_Json::encode(array("error" => $e->getMessage()));
            $this->getResponse()->setHttpResponseCode(400);
        }
        // action body
    }

    public function getAction()
    {
        // action body
        $commentsMapper = new Application_Model_CommentsMapper();
        try {
            $event = $commentsMapper->find($this->_request->getParam('id'));
            if(count($event) > 0){
                echo Zend_Json::encode($event);
                $this->getResponse()->setHttpResponseCode(200);
            }else{
                echo Zend_Json::encode(array("error" => "No data found."));
                $this->getResponse()->setHttpResponseCode(400);
            }
        } catch (Exception $e) {
            echo Zend_Json::encode(array("error" => $e->getMessage()));
            $this->getResponse()->setHttpResponseCode(400);
        }
    }

    public function postAction()
    {
        // action body
        $requestParams = $this->_request->getParams();
        $this->_helper->help->formatRequestParams($requestParams);

        $commentsMapper = new Application_Model_CommentsMapper();
        try {
            echo Zend_Json::encode(array("id" => $commentsMapper->insert($requestParams)));
            $this->getResponse()->setHttpResponseCode(200);
        } catch (Exception $e) {
            echo Zend_Json::encode(array("error" => $e->getMessage()));
            $this->getResponse()->setHttpResponseCode(400);
        }
    }

    public function putAction()
    {
        // action body
        $requestParams = $this->_request->getParams();
        $this->_helper->help->formatRequestParams($requestParams);

        $commentsMapper = new Application_Model_CommentsMapper();
        try {
            $update = $commentsMapper->update($requestParams);
            if($update > 0){
                echo Zend_Json::encode(array("id" => $requestParams['id']));
                $this->getResponse()->setHttpResponseCode(200);
            }else{
                echo Zend_Json::encode(array("error" => "No data for update."));
                $this->getResponse()->setHttpResponseCode(400);
            }
        } catch (Exception $e) {
            echo Zend_Json::encode(array("error" => $e->getMessage()));
            $this->getResponse()->setHttpResponseCode(400);
        }
    }

    public function deleteAction()
    {
        // action body
        $id = $this->_request->getParam('id');
        $commentsMapper = new Application_Model_CommentsMapper();
        try {
            $delete = $commentsMapper->delete($id);
            if($delete > 0){
                echo Zend_Json::encode(array("id" => $id));
                $this->getResponse()->setHttpResponseCode(200);
            }else{
                echo Zend_Json::encode(array("error" => "No data for delete."));
                $this->getResponse()->setHttpResponseCode(400);
            }
        } catch (Exception $e) {
            echo Zend_Json::encode(array("error" => $e->getMessage()));
            $this->getResponse()->setHttpResponseCode(400);
        }
    }

}









