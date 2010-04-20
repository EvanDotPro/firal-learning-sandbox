<?php
class Firal_Addon_Loader
{
    protected $_addonsDir;

    public function __construct()
    {
        $this->_addonsDir = APPLICATION_PATH . DIRECTORY_SEPARATOR . 'addons';
        Zend_Controller_Action_HelperBroker::getStaticHelper('viewRenderer')->initView();
    }

    public function loadAddon($addon)
    {
        $addonDir = $this->_addonsDir . DIRECTORY_SEPARATOR . $addon;
        if (!Zend_Loader::isReadable($addonDir . DIRECTORY_SEPARATOR . 'config.php')) {
            throw new Exception('Invalid add-on loaded: ' . $addon);
        }
        $view = Zend_Controller_Action_HelperBroker::getStaticHelper('viewRenderer')->view;
        $front = Zend_Controller_Front::getInstance();
        try {
            $modulesDir = new DirectoryIterator($addonDir . DIRECTORY_SEPARATOR . 'modules');
        } catch(Exception $e) { }

        foreach ($modulesDir as $file) {
            if ($file->isDot() || !$file->isDir()) {
                continue;
            }
            $moduleName = strtolower($file->getFilename());
            if (substr($moduleName, 0, 4) == 'ext_') {
                // We don't set up 'extended' modules the same as new modules.
                continue;
            }
            $this->loadModule($file->getPathname(), $moduleName);
        }
    }

    public function loadModule($moduleDirectory, $moduleName)
    {
        $front = Zend_Controller_Front::getInstance();
        $view = Zend_Controller_Action_HelperBroker::getStaticHelper('viewRenderer')->view;
        $controllerDirectory = $moduleDirectory . DIRECTORY_SEPARATOR . $front->getModuleControllerDirectoryName();
        $viewDirectory = $moduleDirectory . DIRECTORY_SEPARATOR . 'views';
        $front->addControllerDirectory($controllerDirectory, $moduleName);
        $view->addBasePath($viewDirectory);
        $autoloader = new Zend_Application_Module_Autoloader(array(
            'namespace' => false,
            'basePath'  => dirname($moduleDirectory),
        ));
    }

    public function addViewPaths($viewBasePath)
    {
        $view = Zend_Controller_Action_HelperBroker::getStaticHelper('viewRenderer')->view;
        $view->addBasePath($ViewBasePath);
    }
}
