<?php

namespace kukovski\projet\model;

class Frontend
{
    public function login()
    {
        require('view/login.php');
    }
    /*
    public function tryConnect()
    {
    }

    public function disconnection()
    {
    }*/

    public function home()
    {
        require('view/home.php');
    }

    public function listsBillets()
    {
        require('view/listsBillets.php');
    }
}
