<?php

class Application_Model_DbTable_Comments extends Zend_Db_Table_Abstract
{

    protected $_name = 'comments';
    protected $_id = 'id';
    protected $_referenceMap    = array(
        'Events' => array(
            'columns'           => 'event_id',
            'refTableClass'     => 'Application_Model_DbTable_Events',
            'refColumns'        => 'id'
        )
    );

}

