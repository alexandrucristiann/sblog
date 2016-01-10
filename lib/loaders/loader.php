<?php

require_once('exceptions-loader.php');
require_once('resources-loader.php');
require_once('handlers-loader.php');

if(!empty($_SESSION['unique_user']))
{
    try {
    $loggedUser = User::loginSession($_SESSION['unique_user']);
    } catch (InvalidUniqueException $e) {
        echo $e->getMessage();
    } catch (InvalidLoginCredentials $e) {
        echo $e->getMessage();
    }
}
else
    $loggedUser = null;