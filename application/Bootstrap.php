<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initLoad(){
        Zend_Loader::loadFile('Rest_BaseController.php', '/../library');

    }

    public function _initRoutes()
    {

        $front = Zend_Controller_Front::getInstance();

        $front->registerPlugin(new Zend_Controller_Plugin_PutHandler());
        $router = $front->getRouter();

        $restRoute = new Zend_Rest_Route($front);
        $router->addRoute('default', $restRoute);

    }
    
    public function _initLoader()
    {
        Zend_Controller_Action_HelperBroker::addPath(APPLICATION_PATH .'/controllers/helpers');
    }
}

