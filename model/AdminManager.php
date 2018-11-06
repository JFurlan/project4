<?php

// namespace JF\Project4\Model;

// require_once("model/Database.php");

class AdminManager extends Database{

    /**
     * Function = Requête SQL de récupération des commentaires selon l'id du post
     * @param int $postId
     * @return $comments
     */
    public function checkUser($login, $password)
    {
        $db = $this->dbconnect();
        $req = $db->prepare('SELECT * FROM user WHERE login = :login AND password = :password');
        $req->bindValue(':login', htmlspecialchars($login));
        $req->bindValue(':password', md5($password));
        $req->execute();
        $data = $req->fetch(PDO::FETCH_ASSOC);
        if ($data){
            return $data;
        }
    }

    /**
     * Function = Requête SQL Ajout admin
     * @param string $login $password
     * @return $comments
     */
     public function addAdmin($login, $password)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('INSERT INTO user(login, password) VALUES(:login, :password)') or die(print_r($db->errorInfo()));

        $req->bindValue(':login', $login);
        $req->bindValue(':password', md5($password));
        $req->execute();
    }


    

}

