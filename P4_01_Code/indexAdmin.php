<?php
session_start();

use kukovski\projet\model\Backend;
use kukovski\projet\model\Database;


spl_autoload_register(
    function ($class) {
        $controller = 'Backend';
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

$Backend = new Backend();

try {
    if (!empty($_GET['action']) && !empty($_SESSION['LOGGED_ADMIN'])) {
        switch ($_GET['action']) {
            case 'viewAddPost':
                $Backend->viewAddPost();
                break;
            case 'listPost':
                $Backend->listPost();
                break;
            case 'addPost':
                $Backend->addPost();
                break;
            case 'deletePost':
                $Backend->deletePost();
                break;
            case 'editPost':
                $Backend->editPost();
                break;
            case 'updatePost':
                $Backend->updatePost();
                break;
            case 'deleteComment':
                $Backend->deleteComment();
                break;
            case 'deleteReport':
                $Backend->deleteReport();
                break;
            case 'signOut':
                $Backend->signOut();
                break;
            case 'reportedList':
                $Backend->reportedList();
                break;
            default:
                $Backend->home();
        }
    } else {
        $Backend->home();
    }
} catch (Exception $error) {
    echo $error->getMessage();
}
