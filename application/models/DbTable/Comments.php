<?php

/**
 * Class Application_Model_DbTable_Comments
 *
 * Defines relations and base working with database tables
 */
class Application_Model_DbTable_Comments extends Zend_Db_Table_Abstract
{

    /**
     * Table name
     * @var string
     */
    protected $_name = 'comments';

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
        'Events' => array(
            'columns'           => 'event_id',
            'refTableClass'     => 'Application_Model_DbTable_Events',
            'refColumns'        => 'id'
        )
    );

}

