<?php
session_start();

use kukovski\projet\model\Frontend;
use kukovski\projet\model\Backend;
use kukovski\projet\model\Database;


spl_autoload_register(
    function ($class) {
        $controllers = ['Frontend', 'Backend'];
        $array = explode('\\', $class);
        $nameClass = $array[count($array) - 1];

        if (in_array($nameClass, $controllers)) {
            require 'controller/' . $nameClass . '.php';
        } else {
            require 'model/' . $nameClass . '.php';
        }
    }
);

require('env.php');
Database::$servername = $servername;
Database::$username = $username;
Database::$password = $password;
Database::$dbname = $dbname;

$Frontend = new Frontend();
$Backend = new Backend();


try {

    if (!empty($_GET['action'])) {
        switch ($_GET['action']) {
            case 'listsBillets':
                $Frontend->listsBillets();
                break;
            case 'login':
                $Frontend->login();
                break;
            case 'connect':
                $Backtend->connect();
                break;
        }
    } else {
        $Frontend->home();
    }
} catch (Exception $error) {
    echo $error->getMessage();
}
