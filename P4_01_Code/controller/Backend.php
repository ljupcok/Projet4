<?php

namespace kukovski\projet\model;

class Backend extends Database
{
    public function connect()
    {
        if (!empty($_POST['pseudo']) && !empty($_POST['pass'])) {

            if ($this->canConnect($_POST['pseudo'], $_POST['pass'])) {
                header('location: index.php?action=adminSide');
            } else {
                header('location: index.php?action=login&error=1');
            }
        } else {
            header('location: index.php?action=login&error=2');
        }
    }
    private function canConnect(string $pseudo, string $pass)
    {
        $Admin = new Admin();
        $results = $Admin->getAdminByPseudo($pseudo);
        if (!$results) {
            return false;
        }

        return password_verify($pass, $results['password']);
    }
}
