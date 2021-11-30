<?php

namespace kukovski\projet\model;

class Admin extends Database
{
    public function getAdmins()
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM UserAdmin');
        $req->execute();
        $results = $req->fetchAll();

        return $results;
    }

    public function getAdminByPseudo($pseudo)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM UserAdmin WHERE pseudo = :pseudo');
        $req->execute(array(
            'pseudo' => $pseudo,
        ));
        $resultat = $req->fetch();

        return $resultat;
    }
}
