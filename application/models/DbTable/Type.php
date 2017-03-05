<?php

/**
 * Class Application_Model_DbTable_Type
 */
class Application_Model_DbTable_Type extends Zend_Db_Table_Abstract
{

    /**
     * Table name
     * @var string
     */
    protected $_name = 'type';

    /**
     * Identifier
     * @param string $id
     */
    protected $_id = 'id';


    /**
     * Table relations
     * @var array
     */
    protected $_referenceMap    = array(
        'Type' => array(
            'columns'           => 'id',
            'refTableClass'     => 'Application_Model_DbTable_Events',
            'refColumns'        => 'type'
        )
    );

}

