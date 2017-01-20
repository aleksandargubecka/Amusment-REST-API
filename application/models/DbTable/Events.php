<?php

class Application_Model_DbTable_Events extends Zend_Db_Table_Abstract
{

    protected $_name = 'events';
    protected $_id = 'id';
    protected $_referenceMap = array(
        'Comments' => array(
            'columns' => array('event_id'),
            'refTableClass' => 'Application_Model_DbTable_Comments',
            'refColumns' => array('event_id')
        ),
    );
}

