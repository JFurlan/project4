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
        $comments = $db->prepare('INSERT INTO comments(postId, author, comment, postedDate, statut) VALUES(?, ?, ?, NOW(), 0)');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }

    /**
     * Function = Requête SQL de récupération de tous les commentaires
     * @return $comments
     */
    public function getListComments()
    {
        $db = $this->dbConnect();
        $comments = [];

        $req = $db->prepare('SELECT * FROM comments ORDER BY postedDate DESC') or die(print_r($db->errorInfo()));
        $req->execute();

        while($datas = $req->fetch(PDO::FETCH_ASSOC)){
            $comment = new Comment();
            $comment->hydrate($datas);
            array_push($comments, $comment);
        };
        return $comments;
    }

      /**
     * Function = Requête SQL de récupération des commentaires signalés
     * @return $comments
     */
    public function getListReported()
    {
        $db = $this->dbConnect();
        $comments = [];

        $req = $db->prepare('SELECT * FROM comments WHERE statut = :statut ORDER BY postedDate DESC') or die(print_r($db->errorInfo()));
        $req->bindValue(':statut', "1");
        $req->execute();

        while($datas = $req->fetch(PDO::FETCH_ASSOC)){
            $comment = new Comment();
            $comment->hydrate($datas);
            array_push($comments, $comment);
        };
        return $comments;
    }

    /**
     * Function = Delete comment from BDD
     * @param int $postId
     */
    public function deleteComment($commentId){
        $db = $this->dbConnect();

        $req = $db->prepare('DELETE FROM comments WHERE id = :id');

        $req->bindValue(':id', $commentId);
        $req->execute();
    }

    /**
     * Function = Report comment to BDD
     * @param int $postId
     */
    public function reportingComment($commentId){
        $db = $this->dbConnect();

        $req = $db->prepare('UPDATE comments SET statut = :statut WHERE id = :id');

        $req->bindValue(':id', $commentId);
        $req->bindValue(':statut', "1");
        $req->execute();
    }

    /**
     * Function = Cancel Report comment to BDD
     * @param int $postId
     */
    public function cancelReportingComment($commentId){
        $db = $this->dbConnect();

        $req = $db->prepare('UPDATE comments SET statut = :statut WHERE id = :id');

        $req->bindValue(':id', $commentId);
        $req->bindValue(':statut', "0");
        $req->execute();
    }
}

