<?php

// namespace JF\Project4\Model;

// use \PDO;

class Database{

    protected $_db;
    
    /**
     * Function = Requête SQL de récupération des commentaires selon l'id du post
     * @return $db or error
     */
    protected function dbConnect(){
        if($this->_db === null){
            return $this->_db = new PDO('mysql:host=localhost;dbname=OCR_BLOG;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return $this->_db;
    }

}
