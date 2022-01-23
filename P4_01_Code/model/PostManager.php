<?php

use kukovski\projet\model\Database;

class PostManager extends Database
{

    function getAll()
    {
        $db = $this->dbConnect();
        $req = $db->prepare(
            'SELECT id, title, content, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation 
            FROM billets 
            ORDER BY date_creation'
        );
        $req->execute();
        $resultats = $req->fetchAll();
        return $resultats;
    }

    function get($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare(
            'SELECT id, title, content, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation
            FROM billets
            WHERE id = :id'
        );
        $req->execute(
            [':id' => $id]
        );
        $resultat = $req->fetch();
        return $resultat;
    }

    public function set(string $title, string $content)
    {
        $db = $this->dbConnect();
        $req = $db->prepare(
            'INSERT INTO billets(title, content, date_creation) 
            VALUES( :title, :content, NOW())'
        );
        $req->execute(array(
            ':title' => $title,
            ':content' => $content,
        ));
    }

    public function update(int $id, string $title, string $content)
    {
        $db = $this->dbConnect();
        $req = $db->prepare(
            'UPDATE billets 
            SET title = :title, content = :content, date_creation = NOW() 
            WHERE id = :id'
        );
        $req->execute(array(
            ':title' => $title,
            ':content' => $content,
            ':id' => $id,
        ));
    }

    public function delete(int $id)
    {
        if ($id > 0) {
            $db = $this->dbConnect();
            $query = $db->prepare('DELETE FROM billets WHERE id = :id');
            $query->execute(array(
                ':id' => $id,
            ));
        }
    }

    function getWithComments(int $idPost)
    {
        $db = $this->dbConnect();
        $req = $db->prepare(
            'SELECT b.title, b.content, DATE_FORMAT(b.date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation, 
            c.id, c.author, c.comment, DATE_FORMAT(c.date_comment, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comment
            FROM billets AS b
            LEFT JOIN comments AS c
            ON b.id = c.id_billet
            WHERE b.id = :id'
        );
        $req->execute(array(
            ':id' => $idPost,
        ));
        $resultat = $req->fetchAll();
        return $resultat;
    }
}
