<?php

/**
 * Class Application_Model_DbTable_Users
 *
 * Defines relations and base working with database tables
 */
class Application_Model_DbTable_Users extends Zend_Db_Table_Abstract
{

    /**
     * Table name
     * @var string
     */
    protected $_name = 'users';
    /**
     * Identifier
     * @var array
     */
    protected $_dependentTables = array('Application_Model_DbTable_UserEvents');

}

