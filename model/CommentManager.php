<?php

namespace JF\Project4\Model;

require_once("model/Manager.php");

class CommentManager extends Manager{

    /**
     * Function = Requête SQL de récupération des commentaires selon l'id du post
     * @param int $postId
     * @return $comments
     */
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

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
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }

}

