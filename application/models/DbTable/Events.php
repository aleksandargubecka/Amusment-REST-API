<?php

class Application_Model_DbTable_Events extends Zend_Db_Table_Abstract
{

    protected $_name = 'events';
    protected $_id = 'id';
    protected $_dependentTables = array('Application_Model_DbTable_Comments', 'Application_Model_DbTable_UserEvents');

}

