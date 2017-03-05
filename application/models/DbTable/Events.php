<?php

/**
 * Class Application_Model_DbTable_Events
 *
 * Defines relations and base working with database tables
 */
class Application_Model_DbTable_Events extends Zend_Db_Table_Abstract
{
    /**
     * Table name
     * @param string $name
     */
    protected $_name = 'events';

    /**
     * Identifier
     * @param string $id
     */
    protected $_id = 'id';

    /**
     * Table relations
     * @param array $dependentTables
     */
    protected $_dependentTables = array('Application_Model_DbTable_Comments', 'Application_Model_DbTable_UserEvents');

}

