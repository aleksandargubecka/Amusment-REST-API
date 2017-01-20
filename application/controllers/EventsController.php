<?php

class EventsController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
        $this->_helper->viewRenderer->setNoRender(true);
    }

    public function indexAction()
    {
        // action body
        $eventsMapper = new Application_Model_EventsMapper();
        try {
            $events = $eventsMapper->fetchAll();
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
        $eventsMapper = new Application_Model_EventsMapper();
        try {
            $event = $eventsMapper->find($this->_request->getParam('id'));
            if(count($event) > 0){
                $currentEvent = $event->current();
//                echo '<pre>';
//                var_dump($currentEvent->findDependentRowset('Application_Model_DbTable_Comments'));
//                echo '</pre>';
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

        $eventsMapper = new Application_Model_EventsMapper();
        try {
            echo Zend_Json::encode(array("id" => $eventsMapper->insert($requestParams)));
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

        $eventsMapper = new Application_Model_EventsMapper();
        try {
            $update = $eventsMapper->update($requestParams);
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
        $eventsMapper = new Application_Model_EventsMapper();
        try {
            $delete = $eventsMapper->delete($id);
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









