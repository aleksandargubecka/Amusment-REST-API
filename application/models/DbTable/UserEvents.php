<?php

class Application_Model_DbTable_UserEvents extends Zend_Db_Table_Abstract
{

    protected $_name = 'user_events';
    protected $_id = 'id';
    protected $_referenceMap    = array(
        'Application_Model_DbTable_Users' => array(
            'columns'           => 'user_id',
            'refTableClass'     => 'Application_Model_DbTable_Users',
            'refColumns'        => 'id'
        ),
        'Application_Model_DbTable_Events' => array(
            'columns'           => 'event_id',
            'refTableClass'     => 'Application_Model_DbTable_Events',
            'refColumns'        => 'id'
        )
    );
}

