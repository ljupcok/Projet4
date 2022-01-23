<?php

use kukovski\projet\model\Database;

class ReportManager extends Database
{

    public function get(int $id)
    {
        $db = $this->dbConnect();
        $req = $db->query(
            'SELECT *  
            FROM reportedComment
            WHERE id= :id'
        );
        $req->execute(array(
            'id' => $id,
        ));
        $resultat = $req->fetch();
        return $resultat;
    }

    function getAll()
    {
        $db = $this->dbConnect();
        $req = $db->prepare(
            'SELECT COUNT(*) AS count_report, id_comment  
            FROM reportedComment 
            GROUP BY id_comment'
        );
        $req->execute();
        $resultats = $req->fetchAll();
        return $resultats;
    }

    public function set(int $id_comment)
    {
        $db = $this->dbConnect();
        $req = $db->prepare(
            'INSERT INTO reportedComment(id_comment)  
            VALUES(:id_comment)'
        );
        $req->execute(array(
            ':id_comment' => $id_comment,
        ));
    }

    public function delete(int $id)
    {
        if ($id > 0) {
            $db = $this->dbConnect();
            $req = $db->prepare('DELETE FROM reportedComment WHERE id_comment = :id');
            $req->execute(array(
                ':id' => $id,
            ));
        }
    }
}
