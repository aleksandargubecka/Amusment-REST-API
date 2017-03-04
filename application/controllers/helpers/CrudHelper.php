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
     * @param array $dependencies
     */
    public function getOneWithDependencies($mapper, $params, array $dependencies)
    {
        try {
            $id = $params;
            $row = $mapper->find($id)->current();
            $rowArr = $row->toArray();

            if (count($dependencies) === 1) {
                $name = key($dependencies);
                $single_dependency = $row->findDependentRowset($dependencies[$name])->toArray();
                $rowArr["dependencies"] = array(
                    $name => $single_dependency
                );
            } else {
                $numericDependecies = array_values($dependencies);
                $rowArr["dependencies"][array_search($numericDependecies[0], $dependencies)] = $row->findManyToManyRowset($numericDependecies[0],$numericDependecies[1], $numericDependecies[2])->toArray();
            }

            $this->sendJsonResponseSuccess($rowArr, "No data found.");
        } catch (Exception $e) {
            $this->sendJsonResponseError($e);
        }
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