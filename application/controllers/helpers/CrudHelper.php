<?php

class Zend_Controller_Action_Helper_CrudHelper extends Zend_Controller_Action_Helper_Abstract
{
    private function sendJsonResponseSuccess($data, $errorMsg)
    {
        if(!empty($data)){
            self::echoEncodedJson($data);
            $this->getResponse()->setHttpResponseCode(200);
        }else{
            self::echoEncodedJson(array("error" => $errorMsg));
            $this->getResponse()->setHttpResponseCode(400);
        }
    }

    private function sendJsonResponseError(Exception $exception){
        self::echoEncodedJson(array("error" => $exception->getMessage()));
        $this->getResponse()->setHttpResponseCode(400);
    }

    public static function echoEncodedJson($data)
    {
        echo Zend_Json::encode($data);
    }

    public function get($mapper)
    {
        try {
            $rows = $mapper->fetchAll();
            $this->sendJsonResponseSuccess($rows, "No data found.");
        } catch (Exception $e) {
            $this->sendJsonResponseError($e);
        }
    }

    public function getOne($mapper, $id)
    {
        try {
            $row = $mapper->find($id)->current();
            $this->sendJsonResponseSuccess($row, "No data found.");
        } catch (Exception $e) {
            $this->sendJsonResponseError($e);
        }
    }

    // TODO Set dependencies and dependency
    public function getOneWithDependencies($mapper, $id, array $dependencies)
    {
        try {
            $row = $mapper->find($id)->current();
            $rowArr = $row->toArray();

            if(count($dependencies) === 1){
                $name = key($dependencies);
                $single_dependency =  $row->findDependentRowset($dependencies[$name])->toArray();
                $rowArr["dependencies"] = array(
                    $name => $single_dependency
                );
            }else{
                echo '<pre>';
                var_dump($mapper);
                echo '</pre>';
                echo '<pre>';
                var_dump($dependencies);
                echo '</pre>';
//                $rowArr["dependencies"] = array(
//                    $name => $single_dependency
//                );
                echo '<pre>';
                var_dump($row->findManyToManyRowset('Application_Model_DbTable_Users', 'Application_Model_DbTable_UserEvents', 'Application_Model_DbTable_Events')->toArray());
                echo '</pre>';

            }

//            foreach ($dependencies as $name => $dependency) {
//                $single_dependency =  $row->findDependentRowset($dependency)->toArray();
//                $rowArr["dependencies"] = array(
//                    $name => $single_dependency
//                );
//            }

            $this->sendJsonResponseSuccess($rowArr, "No data found.");
        } catch (Exception $e) {
            $this->sendJsonResponseError($e);
        }
    }

    public function insert($mapper, $params)
    {
        try {
            $this->sendJsonResponseSuccess(array("id" => $mapper->insert($params)), "No data for update.");
        } catch (Exception $e) {
            $this->sendJsonResponseError($e);
        }
    }

    public function update($mapper, $params)
    {
        try {
            $update = ($mapper->update($params)) ? $params["id"] : 0;
            $this->sendJsonResponseSuccess($update, "No data for update.");
        } catch (Exception $e) {
            $this->sendJsonResponseError($e);
        }
    }

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