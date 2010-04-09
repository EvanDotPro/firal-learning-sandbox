<?php
class Firal_Controller_Plugin_Layout extends Zend_Layout_Controller_Plugin_Layout
{
    public function preDispatch(Zend_Controller_Request_Abstract $request)
    {
        $layout = $this->getLayout();

        $view   = $layout->getView();
        $moduleName = $request->getModuleName();

        $moduleDirectory = Zend_Controller_Front::getInstance()->getModuleDirectory($moduleName);

        $viewDirectory = $moduleDirectory . '/views';
        $layoutDirectory = $viewDirectory . '/layouts';
        $view->addBasePath($viewDirectory);
        if(is_dir($layoutDirectory)){
            $view->addScriptPath($layoutDirectory);
        }
    }
}
