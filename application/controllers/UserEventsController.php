<?php

/**
 * Class UserEventsController
 * 
 * Working with "UserEvents" database
 */
class UserEventsController extends Zend_Controller_Action
{
    /**
     * Contains Application_Model_{database name}Mapper for easier accessing
     * @var
     */
    private $mapper;

    /**
     * Defining helper for easier accessing
     * @var
     */
    private $helper;

    /**
     * Defining curd helper for easier accessing
     * @var
     */
    private $crudHelper;

    /**
     * It's like _constructor
     */
    public function init()
    {
        $this->_helper->viewRenderer->setNoRender(true); // Disable frontend rendering
        
        /* Initialize action controller here */
        $this->mapper = new Application_Model_UserEventsMapper();
        $this->helper = $this->_helper->help;
        $this->crudHelper = $this->_helper->CrudHelper;
    }

    /**
     * Fetching all data from database
     */
    public function indexAction()
    {
        /* Select all rows request */
        $this->crudHelper->get($this->mapper);
    }

    /**
     * Fetching one row from database if dependencies parameter is defined it will get all the data from dependencies
     */
    public function getAction()
    {
        if($this->helper->isWithDependenciesClasses($this->_request->getParams())){
            /* Select one row request */
            $this->crudHelper->getOneWithDependencies($this->mapper, $this->_request->getParams(), $this->helper->getDependenciesClasses($this->_request->getParam("dependencies")));
        }else{
            /* Select one row request */
            $this->crudHelper->getOne($this->mapper, $this->_request->getParam('id'));
        }
    }

    /**
     * Action for inserting single row
     */
    public function postAction()
    {
        $requestParams = $this->_request->getParams();
        $this->_helper->help->formatRequestParams($requestParams);

        /* Insert request */
        $this->crudHelper->insert($this->mapper, $requestParams);
    }

    /**
     * Action for updating single row
     */
    public function putAction()
    {
        $requestParams = $this->_request->getParams();
        $this->_helper->help->formatRequestParams($requestParams);

        /* Update request */
        $this->crudHelper->update($this->mapper, $requestParams);
    }

    /**
     * Action for deleting single row
     */
    public function deleteAction()
    {
        /* Delete request */
        $this->crudHelper->delete($this->mapper, $this->_request->getParam('id'));
    }
}









