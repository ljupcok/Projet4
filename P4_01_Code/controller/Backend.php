<?php

namespace kukovski\projet\model;

class Backend
{
    public function connect()
    {
        if (!empty($_POST('pseudo')) && !empty($_POST('pass'))) {
            if ($_POST['pseudo'] === 'jean' && $_POST['password'] === 'lu') {
                header('Location: adminSide.php');
            } else {
                $erreur = " identifiant incorrect";
            }
        }
    }
}
