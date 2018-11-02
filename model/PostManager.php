<?php

//namespace JF\Project4\Model;

//use JF\Project4\Model\Database;

//require_once("model/Database.php");

class PostManager extends Database{


    /**
     * Function = Requête SQL de récupération de tous les posts
     * @return $req
     */
    public function getPostsHome()
    {
        $db = $this->dbConnect();
        $posts = []; 

        $req = $db->query('SELECT * FROM posts ORDER BY creationDate DESC LIMIT 0, 4')  or die(print_r($db->errorInfo()));

        while($datas = $req->fetch(PDO::FETCH_ASSOC)){
            $post = new Post();
            $post->hydrate($datas);
            array_push($posts, $post);
        };
        return $posts;
    }

    /**
     * Function = Requête SQL de récupération de tous les posts
     * @return $req
     */
    public function getPosts()
    {
        $db = $this->dbConnect();
        $posts = []; 

        $req = $db->query('SELECT * FROM posts ORDER BY creationDate DESC')  or die(print_r($db->errorInfo()));

        while($datas = $req->fetch(PDO::FETCH_ASSOC)){
            $post = new Post();
            $post->hydrate($datas);
            array_push($posts, $post);
        };
        return $posts;
    }


    /**
     * Function = Requête SQL de récupération du post selon son id
     * @param int $postId
     * @return $post
     */
    public function getPost($postId){
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT * FROM posts WHERE id = :id') or die(print_r($db->errorInfo()));
        $req->bindValue(':id', $postId);
        $req->execute();

        $datas = $req->fetch(PDO::FETCH_ASSOC);

        $post = new Post();
        $post->hydrate($datas);

        return $post;
    }


    /**
     * Function = add post to BDD
     * @param Post $post
     */
    public function addPost(Post $post){
        $db = $this->dbConnect();

        $req = $db->prepare('INSERT INTO posts(id, title, subtitle, content, creationDate, postImg) VALUES(:id, :title, :subtitle, :content, :creationDate, :postImg)');

        $req->bindValue(':id', $post->getId());
        $req->bindValue(':title', $post->getTitle());
        $req->bindValue(':subtitle', $post->getSubTitle());
        $req->bindValue(':content', $post->getContent());
        $req->bindValue(':creationDate', $post->getCreationDate());
        $req->bindValue(':postImg', $post->getPostImg());
        $req->execute();
    }


    /**
     * Function = update post to BDD
     * @param Post $post
     */
    public function updatePost(Post $post){
        $db = $this->dbConnect();

        $req = $db->prepare('UPDATE posts SET title = :title, subtitle = :subtitle, content = :content, creationDate = :creationDate, postImg = :postImg WHERE id = :id');

        $req->bindValue(':id', $post->getId());
        $req->bindValue(':title', $post->getTitle());
        $req->bindValue(':subtitle', $post->getSubTitle());
        $req->bindValue(':content', $post->getContent());
        $req->bindValue(':creationDate', $post->getCreationDate());
        $req->bindValue(':postImg', $post->getPostImg());
        $req->execute();
    }


    /**
     * Function = Delete post from BDD
     * @param int $postId
     */
    public function deletePost($postId){
        $db = $this->dbConnect();

        $req = $db->prepare('DELETE FROM posts WHERE id = :id');

        $req->bindValue(':id', $postId);
        $req->execute();
    }


}
