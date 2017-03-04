<?php

class UsersController extends Zend_Controller_Action
{
    private $mapper;
    private $helper;
    private $crudHelper;

    public function init()
    {
        $this->_helper->viewRenderer->setNoRender(true);

        /* Initialize action controller here */
        $this->mapper = new Application_Model_UsersMapper();
        $this->helper = $this->_helper->help;
        $this->crudHelper = $this->_helper->CrudHelper;
    }
    
    public function indexAction()
    {
        // action body
        $this->crudHelper->get($this->mapper);
    }

    public function getAction()
    {
        // action body
        if($this->helper->isWithDependenciesClasses($this->_request->getParams())){
            $this->crudHelper->getOneWithDependencies($this->mapper, $this->_request->getParams(), $this->helper->getDependenciesClasses($this->_request->getParam("dependencies")));
        }else{
            $this->crudHelper->getOne($this->mapper, $this->_request->getParam('id'));
        }
    }

    public function postAction()
    {
        // action body
        $requestParams = $this->_request->getParams();
        $this->_helper->help->formatRequestParams($requestParams);

        $this->crudHelper->insert($this->mapper, $requestParams);
    }

    public function putAction()
    {
        // action body
        $requestParams = $this->_request->getParams();
        $this->_helper->help->formatRequestParams($requestParams);

        $this->crudHelper->update($this->mapper, $requestParams);
    }

    public function deleteAction()
    {
        // action body
        $this->crudHelper->delete($this->mapper, $this->_request->getParam('id'));
    }

}









