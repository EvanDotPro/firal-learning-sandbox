<?php
class ServerBootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initRpcServer()
    {
        $request = new Zend_Controller_Request_Http();
        $path = explode('/',trim($request->getPathInfo(),'/'));
        $path = array_shift($path);
        switch($path){
            case 'xmlrpc':


                break;
            case 'jsonrpc':


                break;
            default:
                die('Invalid API end-point');
                break;
        }
    }

}
