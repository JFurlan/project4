<?php

// namespace JF\Project4\Model;

// require_once("model/Database.php");

class CommentManager extends Database{

    /**
     * Function = Requête SQL de récupération des commentaires selon l'id du post
     * @param int $postId
     * @return $comments
     */
    public function getList($postId)
    {
        $db = $this->dbConnect();
        $comments = [];

        $req = $db->prepare('SELECT * FROM comments WHERE postId = :postId ORDER BY postedDate DESC') or die(print_r($db->errorInfo()));
        $req->bindValue(':postId', $postId);
        $req->execute();

        while($datas = $req->fetch(PDO::FETCH_ASSOC)){
            $comment = new Comment();
            $comment->hydrate($datas);
            array_push($comments, $comment);
        };
        return $comments;
    }


    /**
     * Function = Requête SQL pour ajouter un commentaire
     * @param int $postId
     * @param string $author
     * @param string $comment
     * @return $affectedLines
     */
    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(postId, author, comment, postedDate) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }

}

