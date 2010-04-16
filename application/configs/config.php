<?php
$config = array();


$config['phpSettings']['date']['timezone'] = 'America/Phoenix';
$config['autoloadernamespaces'][] = 'Firal_';

include dirname(__FILE__) . '/' . APPLICATION_MODE . '.' . APPLICATION_ENV . '.config.php';

return $config;
