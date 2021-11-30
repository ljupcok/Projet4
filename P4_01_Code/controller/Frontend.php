<?php

namespace kukovski\projet\model;

class Frontend
{
    public function login()
    {
        require('view/login.php');
    }
    public function adminSide()
    {
        require('view/adminSide.php');
    }
    /*
    public function tryConnect()
    {
    }*/

    public function disconnection()
    {
        if ($_SESSION && $_SESSION['pseudo']) {
            session_destroy();
        }

        header("Location: index.php");
    }

    public function home()
    {
        require('view/home.php');
    }

    public function listsBillets()
    {
        require('view/listsBillets.php');
    }
}
