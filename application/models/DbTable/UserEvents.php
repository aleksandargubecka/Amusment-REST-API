<?php

/**
 * Class Application_Model_DbTable_UserEvents
 * 
 * Defines relations and base working with database tables
 */
class Application_Model_DbTable_UserEvents extends Zend_Db_Table_Abstract
{
    /**
     * Table name
     * @var string
     */
    protected $_name = 'user_events';
    
    /**
     * Identifier
     * @var string
     */
    protected $_id = 'id';
    
    /**
     * Table relations
     * @var array
     */
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

