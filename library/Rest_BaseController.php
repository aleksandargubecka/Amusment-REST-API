<?php

/**
 * CHANGE DESCRIPTION
 *
 * @package gubecka
 */
class Rest_BaseController extends Zend_Controller_Action
{

    /**
     * Fetching all data from database
     */
    protected function indexAction()
    {
        /* Select all rows request */
        $this->crudHelper->get($this->mapper);
    }

    /**
     * Fetching one row from database if dependencies parameter is defined it will get all the data from dependencies
     */
    protected function getAction()
    {
        if($this->helper->isWithDependenciesClasses($this->_request->getParams())){
            /* Select one row request */
            $this->crudHelper->getOneWithDependencies($this->mapper, $this->_request->getParams());
        }else{
            /* Select one row request */
            $this->crudHelper->getOne($this->mapper, $this->_request->getParam('id'));
        }
    }

    /**
     * Action for inserting single row
     */
    protected function postAction()
    {
        $requestParams = $this->_request->getParams();
        $this->_helper->help->formatRequestParams($requestParams);

        /* Insert request */
        $this->crudHelper->insert($this->mapper, $requestParams);
    }

    /**
     * Action for updating single row
     */
    protected function putAction()
    {
        $requestParams = $this->_request->getParams();
        $this->_helper->help->formatRequestParams($requestParams);

        /* Update request */
        $this->crudHelper->update($this->mapper, $requestParams);
    }

    /**
     * Action for deleting single row
     */
    protected function deleteAction()
    {
        /* Delete request */
        $this->crudHelper->delete($this->mapper, $this->_request->getParam('id'));
    }
}