<?php

/**
 * Class Zend_Controller_Action_Helper_Help
 *
 * Global helpere for all kind a differ things
 */
class Zend_Controller_Action_Helper_Help extends Zend_Controller_Action_Helper_Abstract
{

    /**
     * Getting rid of unnecessary data
     * @param $requestParams
     * @return mixed
     */
    public function formatRequestParams(&$requestParams)
    {
        unset($requestParams['controller']);
        unset($requestParams['action']);
        unset($requestParams['module']);

        return $requestParams;
    }

    /**
     * Helper for checking if dependencies parameter is passed in request
     * @param $request
     * @return bool
     */
    public function isWithDependenciesClasses($request)
    {
        if(isset($request["dependencies"]) && !empty($request["dependencies"]) || isset($request["dependency"]) && !empty($request["dependency"]))
            return true;

        return false;
    }
}