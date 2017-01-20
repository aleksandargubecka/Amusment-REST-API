<?php

class UsersController extends Zend_Controller_Action
{
    public function init()
    {
        /* Initialize action controller here */
        $this->_helper->viewRenderer->setNoRender(true);
    }

    public function indexAction()
    {
        // action body
        $usersMapper = new Application_Model_UsersMapper();
        try {
            $users = $usersMapper->fetchAll();
            if(count($users) > 0){
                echo Zend_Json::encode($users);
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

    public function getAction()
    {
        // action body
        $usersMapper = new Application_Model_UsersMapper();
        try {
            $user = $usersMapper->find($this->_request->getParam('id'));
            if(count($user) > 0){
                echo Zend_Json::encode($user);
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

    public function postAction()
    {
        // action body
        $requestParams = $this->_request->getParams();
        $this->_helper->help->formatRequestParams($requestParams);

        $usersMapper = new Application_Model_UsersMapper();
        try {
            echo Zend_Json::encode(array("id" => $usersMapper->insert($requestParams)));
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

        $usersMapper = new Application_Model_UsersMapper();
        try {
            $update = $usersMapper->update($requestParams);
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
        $usersMapper = new Application_Model_UsersMapper();
        try {
            $delete = $usersMapper->delete($id);
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









