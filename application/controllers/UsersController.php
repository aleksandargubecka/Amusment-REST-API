<?php

/**
 * Class UsersController
 *
 * Working with "users" database
 */
class UsersController extends Rest_BaseController
{
    /**
     * Contains Application_Model_{database name}Mapper for easier accessing
     * @var
     */
    protected $mapper;

    /**
     * Defining helper for easier accessing
     * @var
     */
    protected $helper;

    /**
     * Defining curd helper for easier accessing
     * @var
     */
    protected $crudHelper;

    /**
     * It's like _constructor
     */
    public function init()
    {
        $this->_helper->viewRenderer->setNoRender(true);

        /* Initialize action controller here */
        $this->mapper = new Application_Model_UsersMapper();
        $this->helper = $this->_helper->help;
        $this->crudHelper = $this->_helper->CrudHelper;
    }
}









