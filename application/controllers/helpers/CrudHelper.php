<?php

/**
 * Class Zend_Controller_Action_Helper_CrudHelper
 *
 * Helper for working with requests and response,
 * It's like a middleware, all the actions in controllers goes trough Zend_Controller_Action_Helper_CrudHelper
 */
class Zend_Controller_Action_Helper_CrudHelper extends Zend_Controller_Action_Helper_Abstract
{
    /**
     * Easier generating of general response
     * @param $data
     * @param $errorMsg
     */
    private function sendJsonResponseSuccess($data, $errorMsg)
    {
        if (!empty($data)) {
            self::echoEncodedJson($data);
            $this->getResponse()->setHttpResponseCode(200);
        } else {
            self::echoEncodedJson(array("error" => $errorMsg));
            $this->getResponse()->setHttpResponseCode(400);
        }
    }

    /**
     * Easier generating of error response
     * @param Exception $exception
     */
    private function sendJsonResponseError(Exception $exception)
    {
        self::echoEncodedJson(array("error" => $exception->getMessage()));
        $this->getResponse()->setHttpResponseCode(400);
    }

    /**
     * Json encoding response data
     * @param $data
     */
    public static function echoEncodedJson($data)
    {
        echo Zend_Json::encode($data);
    }

    /**
     * Get all rows from mapper
     * @param $mapper
     */
    public function get($mapper)
    {
        try {
            $rows = $mapper->fetchAll();
            $this->sendJsonResponseSuccess($rows, "No data found.");
        } catch (Exception $e) {
            $this->sendJsonResponseError($e);
        }
    }

    /**
     * Get one row from mapper
     * @param $mapper
     * @param $id
     */
    public function getOne($mapper, $id)
    {
        try {
            $row = $mapper->find($id)->current();
            $this->sendJsonResponseSuccess($row, "No data found.");
        } catch (Exception $e) {
            $this->sendJsonResponseError($e);
        }
    }

    /**
     * Request for dynamic work with one or more dependencies
     * @param $mapper
     * @param $params
     */
    public function getOneWithDependencies($mapper, $params)
    {
        try {
            $id = $params;
            $dependency = (isset($params["dependency"]) && !empty($params["dependency"])) ? $this->getDependenciesClasses($params["dependency"]) : null;
            $dependencies = (isset($params["dependencies"]) && !empty($params["dependencies"])) ? $this->getDependenciesClasses($params["dependencies"]) : null;
            $row = $mapper->find($id)->current();
            $rowArr = $row->toArray();

            if(!empty($dependency)){
                $rowArr['dependency'] = $this->getDependency($row, $dependency);
                $this->sendJsonResponseSuccess($rowArr, "dNo data found.");
                return;
            }
            if(!empty($dependencies)){
                $rowArr['dependency'] = $this->getDependencies($row, $dependencies);
                $this->sendJsonResponseSuccess($rowArr, "No data found.");
                return;
            }
        } catch (Exception $e) {
            $this->sendJsonResponseError($e);
        }
    }

    /**
     * Getting Dependencies Classes (DbTable)
     * @param $dependencies
     * @return array
     * @throws Exception
     */
    public function getDependenciesClasses($dependencies){
        $dependenciesFormatted = array();
        $dependencies = explode(",", $dependencies);

        foreach ($dependencies as $dependency) {
            $dependency = ucfirst($dependency);
            if(class_exists("Application_Model_DbTable_" . $dependency)){
                $dependenciesFormatted[strtolower($dependency)] = "Application_Model_DbTable_" . $dependency;
            }else{
                throw new Exception("$dependency dependency not found");
            }
        }

        return $dependenciesFormatted;
    }

    protected function getDependency($row, $dependency){
        $dependency_data = array();
        try{
            if (count($dependency) === 1) {
                $name = key($dependency);
                $single_dependency = $row->findDependentRowset($dependency[$name])->toArray();
                $dependency_data[$name] = $single_dependency;
            } else {
                $numeric_dependencies = array_values($dependency);
                $dependency_data[array_search($numeric_dependencies[0], $dependency)] = $row->findManyToManyRowset($numeric_dependencies[0],$numeric_dependencies[1], $numeric_dependencies[2])->toArray();
            }
        }catch (Exception $e) {
            $dependency_data = $e;
        }
        return $dependency_data;
    }

    public function getDependencies($row, $dependencies){
        $dependency_data = array();
        foreach ($dependencies as $name => $dependency) {
            $dependency_data[$name] = $row->findDependentRowset($dependency)->toArray();
        }
        return $dependency_data;
    }

    /**
     * Helper for inserting to mapper's database and generating response
     * @param $mapper
     * @param $params
     */
    public function insert($mapper, $params)
    {
        try {
            $this->sendJsonResponseSuccess(array("id" => $mapper->insert($params)), "No data for update.");
        } catch (Exception $e) {
            $this->sendJsonResponseError($e);
        }
    }

    /**
     * Helper for updating mapper's database and generating response
     * @param $mapper
     * @param $params
     */
    public function update($mapper, $params)
    {
        try {
            $update = ($mapper->update($params)) ? $params["id"] : 0;
            $this->sendJsonResponseSuccess($update, "No data for update.");
        } catch (Exception $e) {
            $this->sendJsonResponseError($e);
        }
    }

    /**
     * Helper for deleting row and generating response
     * @param $mapper
     * @param $id
     */
    public function delete($mapper, $id)
    {
        try {
            $delete = $mapper->delete($id);
            $id = ($delete > 0) ? intval($id) : 0;
            $this->sendJsonResponseSuccess($id, "No data for delete.");
        } catch (Exception $e) {
            $this->sendJsonResponseError($e);
        }
    }

}