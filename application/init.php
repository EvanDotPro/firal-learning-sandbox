<?php

// Define path to application directory
defined('APPLICATION_PATH')
	|| define('APPLICATION_PATH',
			realpath(dirname(__FILE__) . '/../application'));

// Define path to library directory
defined('LIBRARY_PATH')
	|| define('LIBRARY_PATH',
	        realpath(dirname(__FILE__) . '/../library'));

// Define application environment
defined('APPLICATION_ENV')
	|| define('APPLICATION_ENV',
			(getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV')
											: 'production'));
 // Define application mode
defined('APPLICATION_MODE')
	|| define('APPLICATION_MODE',
			(getenv('APPLICATION_MODE') ? getenv('APPLICATION_MODE')
											: 'local'));

define('REQUEST_MICROTIME', microtime(true));

// Set the include path
set_include_path(implode(PATH_SEPARATOR, array('.',LIBRARY_PATH)));



try {
    require_once 'Zend/Application.php';
    $application = new Zend_Application(
    	APPLICATION_ENV,
    	APPLICATION_PATH . '/configs/config.php'
    );
    $application->bootstrap();
} catch(Zend_Config_Exception $e){
    die('config fail');
}

$application->run();
