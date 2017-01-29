<?php

class Zend_Controller_Action_Helper_Help extends Zend_Controller_Action_Helper_Abstract
{

    public function formatRequestParams(&$requestParams)
    {
        unset($requestParams['controller']);
        unset($requestParams['action']);
        unset($requestParams['module']);

        return $requestParams;
    }

    public function isWithDependenciesClasses($request)
    {
        if(isset($request["dependencies"]) && !empty($request["dependencies"]))
            return true;

        return false;
    }

    public function hasDependenciesClasses($request){
        
        return class_exists("Application_Model_DbTable_" . $request["dependencies"]);
    
    }

    public function getDependenciesClasses($dependencies){
        $dependenciesFormatted = array();
        $dependencies = explode(",", $dependencies);

        foreach ($dependencies as $dependency) {
            $dependenciesFormatted[strtolower($dependency)] = "Application_Model_DbTable_" . $dependency;
        }

        return $dependenciesFormatted;
    }
}