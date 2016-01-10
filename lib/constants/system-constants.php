<?php

define('SUBDIRECTORY',null);
define('ROOT',str_replace('lib\constants','',realpath(dirname(__FILE__))));
define('HANDLERS_PATH',str_replace("\\","/",ROOT.'lib\handlers\\'));
define('MODELS_PATH',str_replace("\\","/",ROOT.'lib\models\\'));
define('MODULES_PATH',str_replace("\\","/",ROOT.'lib\modules\\'));
define('APPLICATION_CONSTANTS',str_replace("\\","/",ROOT.'lib\constants\\'));
define('LOADERS',str_replace("\\","/",ROOT.'lib/loaders\\'));
define('COLLECTION_PATH',str_replace("\\","/",ROOT.'lib\collections\\'));
define('CONSTANTS_PATH',str_replace("\\","/",ROOT.'lib\constants\\'));
define('EXCEPTIONS_PATH',str_replace("\\","/",ROOT.'lib\exceptions\\'));
define('APP_PATH','http'.(isset($_SERVER['HTTPS'])?'s':'').'://'.$_SERVER['SERVER_NAME'].'/'.SUBDIRECTORY);
define('APP_WEBSITE','http'.(isset($_SERVER['HTTPS'])?'s':'').'://'.$_SERVER['SERVER_NAME'].'/'.SUBDIRECTORY);