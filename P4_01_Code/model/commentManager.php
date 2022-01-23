<?php

use kukovski\projet\model\Database;

class CommentManager extends Database
{

    public function getComment(int $id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare(
            'SELECT id_billet, author, comment, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comment 
            FROM comments
            WHERE id = :id'
        );
        $req->execute(array(
            ':id' => $id,
        ));
        $resultat = $req->fetch();
        return $resultat;
    }

    public function setComment(int $postId, string $author, string $content)
    {
        $db = $this->dbConnect();
        $req = $db->prepare(
            'INSERT INTO comments(id_billet, author, comment, date_comment)  
            VALUES(:id_billet,:author, :comment, NOW())'
        );
        $req->execute(array(
            ':id_billet' => $postId,
            ':author' => $author,
            ':comment' => $content,
        ));
    }

    public function deleteComment(int $id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comments WHERE id = :id');
        $req->execute(array(
            ':id' => $id,
        ));
    }
}
