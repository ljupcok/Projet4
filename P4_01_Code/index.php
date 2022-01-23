<?php
session_start();

use kukovski\projet\model\Frontend;
use kukovski\projet\model\Database;


spl_autoload_register(
    function ($class) {
        $controller = 'Frontend';
        $array = explode('\\', $class);
        $nameClass = $array[count($array) - 1];

        if ($nameClass === $controller) {
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

try {

    if (!empty($_GET['action'])) {
        switch ($_GET['action']) {
            case 'postsLists':
                $Frontend->postsLists();
                break;
            case 'billet':
                $Frontend->billet();
                break;
            case 'addComment':
                $Frontend->addComment();
                break;
            case 'report':
                $Frontend->report();
                break;
            default:
                $Frontend->home();
                var_dump($_GET['report']);
        }
    } else {
        $Frontend->home();
    }
} catch (Exception $error) {
    echo $error->getMessage();
}
