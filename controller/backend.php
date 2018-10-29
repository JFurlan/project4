<?php

// use \JF\Project4\Model\CommentManager;
// use \JF\Project4\Model\PostManager;

// require_once('model/PostManager.php');
// require_once('model/CommentManager.php'); 

/**
 * Function = récupération de tous les posts
 */
function adminHome(){

    $postManager = new PostManager();
    $posts = $postManager->getPosts();
    require('view/backend/adminHome.php');
}

/**
 * Function = Affichage formulaire "Ajouter un post"
 */
function adminNewPost(){
    require('view/backend/adminPost.php');
}

/**
* Function = Affichage du Post avec ses données
 */
function adminEditPost(){
    $id = $_GET['id'];
    $action = "index.php?action=updatePost";
    $manager = new PostManager();
    $post = $manager->getPost($id);
    $_id = $post->getId();
    $_title = $post->getTitle();
    $_content = $post->getContent();
    $_creationDate = $post->getCreationDate();
    $_postImg = $post->getPostImg();
    //var_dump($post);
    require('view/backend/adminPost.php');
}

/**
* Function = Affichage du Post avec ses données
 */
function updatePost(){
    $updatedPost = new Post;
    $updatedPost->setId($_POST['id']);
    $updatedPost->setTitle($_POST['title']);
    $updatedPost->setContent($_POST['content']);
    $updatedPost->setCreationDate($_POST['creationDate']);
    if(!$_FILES['postImg']['error']){
        $updatedPost->setPostImg($_FILES['postImg']['name']);
        uploadImage();
    }
    else{
        $updatedPost->setPostImg($_POST['img']);
    }

    $manager = new PostManager;
    $manager->updatePost($updatedPost);
    require('view/backend/adminPost.php');
    header("Refresh: 3; URL=index.php?action=adminHome");
    throw new Exception('Les informations de l\'article ont bien été modifiées. <br>Vous allez être redirigé vers la Home de l\'administration.');
}


/**
* Function = Upload de l'image associée à l'article
 */
function uploadImage(){
    if(isset($_FILES['postImg'])){
        $file = $_FILES['postImg']['name'];
        $size = $_FILES['postImg']['size'];
        $tmp = $_FILES['postImg']['tmp_name'];
        $type = $_FILES['postImg']['type'];

        if(is_uploaded_file($tmp)){
            if ($type =="image/jpeg" || $type =="image/jpg" || $type =="image/jpng" && $size<= 1000000) {
                $fileName = $file;
                move_uploaded_file($tmp, 'public/img/' . $fileName);
                echo "Votre image a été téléchargée avec succès";
            }
            else{
                echo "L'import de votre image a été rejeté. <br>Vérifiez son poids et/ou son type.";
            }
        }
    }
}