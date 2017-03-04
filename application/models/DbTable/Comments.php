<?php

/**
 * Class Application_Model_DbTable_Comments
 */
class Application_Model_DbTable_Comments extends Zend_Db_Table_Abstract
{

    /**
     * @var string
     */
    protected $_name = 'comments';
    /**
     * @var string
     */
    protected $_id = 'id';
    /**
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

