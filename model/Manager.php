<?php

namespace JF\Project4\Model;

use \PDO;

class Manager{

    /**
     * Function = Requête SQL de récupération des commentaires selon l'id du post
     * @return $db or error
     */
    protected function dbConnect(){

        $db = new PDO('mysql:host=localhost;dbname=BLOG_TEST;charset=utf8', 'root', 'root');
        
        return $db;

    }

}
