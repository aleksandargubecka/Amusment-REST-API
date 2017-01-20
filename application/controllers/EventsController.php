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
            $this->_helper->help->sendJsonResponseSuccess($events, "No data found.");
        } catch (Exception $e) {
            $this->_helper->help->sendJsonResponseError($e);
        }
        // action body
    }

    public function getAction()
    {
        // action body
        $eventsMapper = new Application_Model_EventsMapper();
        try {
            $event = $eventsMapper->find($this->_request->getParam('id'));
            $this->_helper->help->sendJsonResponseSuccess($event[0], "No data found.");

//            if(count($event) > 0){
//                $currentEvent = $event->current();
//                echo '<pre>';
//                var_dump($currentEvent->findDependentRowset('Application_Model_DbTable_Comments'));
//                echo '</pre>';
//                echo Zend_Json::encode($event);
//                $this->getResponse()->setHttpResponseCode(200);
//            }else{
//                echo Zend_Json::encode(array("error" => "No data found."));
//                $this->getResponse()->setHttpResponseCode(400);
//            }
        } catch (Exception $e) {
            $this->_helper->help->sendJsonResponseError($e);
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
            $this->_helper->help->sendJsonResponseSuccess($update, "No data for update.");
        } catch (Exception $e) {
            $this->_helper->help->sendJsonResponseError($e);
        }
    }

    public function deleteAction()
    {
        // action body
        $id = $this->_request->getParam('id');
        $eventsMapper = new Application_Model_EventsMapper();
        try {
            $delete = $eventsMapper->delete($id);
            $id = ($delete > 0) ? intval($id) : 0;
            $this->_helper->help->sendJsonResponseSuccess($id, "No data for delete.");
        } catch (Exception $e) {
            $this->_helper->help->sendJsonResponseError($e);
        }
    }


}









