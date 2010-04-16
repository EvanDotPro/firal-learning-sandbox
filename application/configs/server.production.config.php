<?php
$config['bootstrap']['path']    = APPLICATION_PATH . '/ServerBootstrap.php';
$config['bootstrap']['class']   = 'ServerBootstrap';

$config['resources']['layout']['pluginClass']  = 'Firal_Controller_Plugin_Layout';
$config['resources']['layout']['layout'] = 'layout';
$config['resources']['modules'] = array();

$config['resources']['frontController']['moduleDirectory'] = APPLICATION_PATH . '/modules';
$config['resources']['frontController']['defaultModule'] = 'default';
$config['resources']['frontController']['throwExceptions'] = true;
//$config['resources']['frontController']['returnResponse'] = true;
$config['resources']['frontController']['prefixDefaultModule'] = true;

$config['resources']['multidb']['master']['adapter']    = 'pdo_mysql';
$config['resources']['multidb']['master']['host']       = 'localdev';
$config['resources']['multidb']['master']['username']   = 'cosmos';
$config['resources']['multidb']['master']['password']   = 'cosmos';
$config['resources']['multidb']['master']['dbname']     = 'cosmos';
$config['resources']['multidb']['master']['default']    = true;
$config['resources']['multidb']['master']['isDefaultTableAdapter'] = true;

$config['resources']['multidb']['slave1']['adapter']    = 'pdo_mysql';
$config['resources']['multidb']['slave1']['host']       = 'localdev';
$config['resources']['multidb']['slave1']['username']   = 'cosmos';
$config['resources']['multidb']['slave1']['password']   = 'cosmos';
$config['resources']['multidb']['slave1']['dbname']     = 'cosmos';
