<?php

define('SUBDIRECTORY',null);
define('ROOT',str_replace('lib\constants','',realpath(dirname(__FILE__))));
define('HANDLERS_PATH',ROOT.'/lib/handlers/');
define('MODELS_PATH',ROOT.'/lib/models/');
define('MODULES_PATH',ROOT.'/lib/modules/');
define('APPLICATION_CONSTANTS',ROOT.'/lib/constants/');
define('LOADERS',ROOT.'/lib/loaders/');
define('COLLECTION_PATH',ROOT.'/lib/collections/');
define('CONSTANTS_PATH',ROOT.'/lib/constants/');
define('EXCEPTIONS_PATH',ROOT.'/lib/exceptions/');
define('APP_PATH','http'.(isset($_SERVER['HTTPS'])?'s':'').'://'.$_SERVER['SERVER_NAME'].'/'.SUBDIRECTORY);
define('APP_WEBSITE','http'.(isset($_SERVER['HTTPS'])?'s':'').'://'.$_SERVER['SERVER_NAME'].'/'.SUBDIRECTORY);