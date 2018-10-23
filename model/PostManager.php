<?php

namespace JF\Project4\Model;

require_once("model/Manager.php");

class PostManager extends Manager{

    /**
     * Function = Requête SQL de récupération de tous les posts
     * @return $req
     */
    public function getPosts(){
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date_fr DESC LIMIT 0, 5');

        return $req;
    }


    /**
     * Function = Requête SQL de récupération du post selon son id
     * @param int $postId
     * @return $post
     */
    public function getPost($postId){
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

}
