<?php

class Application_Model_EventsMapper
{
    protected $_dbTable;

    public function setDbTable($dbTable)
    {
        if (is_string($dbTable)) {
            $dbTable = new $dbTable();
        }
        if (!$dbTable instanceof Zend_Db_Table_Abstract) {
            throw new Exception("Unknown table geteway!");
        }
        $this->_dbTable = $dbTable;
        return $this;
    }

    public function getDbTable()
    {
        if (null == $this->_dbTable) {
            $this->setDbTable('Application_Model_DbTable_Events');
        }
        return $this->_dbTable;
    }

    public function insert($data)
    {
        return $this->getDbTable()->insert($data);
    }

    public function update($data)
    {
        $update = $this->getDbTable()->update($data, array('id=?' => $data['id']));
        return $update;
    }

    public function find($id)
    {
        return $this->getDbTable()->find($id);
    }

    public function fetchAll()
    {
        return $this->getDbTable()->fetchAll();
    }

    public function delete($id)
    {
        return $this->getDbTable()->delete('id=' . $id);
    }

}

