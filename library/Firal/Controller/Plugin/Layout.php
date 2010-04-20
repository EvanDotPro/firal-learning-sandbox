<?php
class Firal_Controller_Plugin_Layout extends Zend_Layout_Controller_Plugin_Layout
{
    public function preDispatch(Zend_Controller_Request_Abstract $request)
    {
        $layout = $this->getLayout();

        $view   = $layout->getView();
        $front  = Zend_Controller_Front::getInstance();
        $moduleName = $request->getModuleName();

        $moduleDirectory = $front->getModuleDirectory($moduleName);

        $viewDirectory = $moduleDirectory . DIRECTORY_SEPARATOR . 'views';
        $layoutDirectory = $viewDirectory . DIRECTORY_SEPARATOR . 'layouts';
        $scriptPaths = $view->getScriptPaths();
        if (!in_array($viewDirectory . DIRECTORY_SEPARATOR . 'scripts', $scriptPaths)) {
            $view->addBasePath($viewDirectory);
        }
        if (is_dir($layoutDirectory) && !in_array($layoutDirectory, $scriptPaths)) {
            $view->addScriptPath($layoutDirectory);
        } else {
            // fall back to the default module's layout
            $defualtModule = $front->getDefaultModule();
            $moduleDirectory = $front->getModuleDirectory($defualtModule);
            $viewDirectory = $moduleDirectory . DIRECTORY_SEPARATOR . 'views';
            $view->addScriptPath($viewDirectory . DIRECTORY_SEPARATOR . 'layouts');
        }
    }
}
