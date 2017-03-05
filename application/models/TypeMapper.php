<?php

class Application_Model_TypeMapper
{

    /**
     * @var
     */
    protected $_dbTable;

    /**
     * @param $dbTable
     * @return $this
     * @throws Exception
     */
    public function setDbTable($dbTable)
    {
        if (is_string($dbTable))
            $dbTable = new $dbTable();

        if (!$dbTable instanceof Zend_Db_Table_Abstract)
            throw new Exception("Unknown table geteway!");

        $this->_dbTable = $dbTable;
        return $this;
    }

    /**
     * @return mixed
     * @throws Exception
     */
    public function getDbTable()
    {
        if (null == $this->_dbTable)
            $this->setDbTable('Application_Model_DbTable_Type');

        return $this->_dbTable;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function insert($data)
    {
        return $this->getDbTable()->insert($data);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function update($data)
    {
        $update = $this->getDbTable()->update($data, array('id=?' => $data['id']));
        return $update;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->getDbTable()->find($id);
    }

    /**
     * @return mixed
     */
    public function fetchAll()
    {
        return $this->getDbTable()->fetchAll();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->getDbTable()->delete('id=' . $id);
    }

}

