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
    $action = "index.php?action=addPost";
    require('view/backend/adminPost.php');
}

/**
* Function = Affichage du Post avec ses données
 */
function addPost(){
    $newPost = new Post;
    $newPost->setId($_POST['id']);
    $newPost->setTitle($_POST['title']);
    $newPost->setSubTitle($_POST['subtitle']);
    $newPost->setContent($_POST['content']);
    $newPost->setCreationDate(date("Y-m-d"));
    if(!$_FILES['postImg']['error']){
        uploadImage();
    }
    $manager = new PostManager;
    $manager->addPost($newPost);
    //require('view/backend/adminPost.php');
    header("Refresh: 3; URL=index.php?action=adminHome");
    throw new Exception('L\'article a bien été créé. <br>Vous allez être redirigé vers la Home de l\'administration.');
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
    $_subtitle = $post->getSubTitle();
    $_content = $post->getContent();
    $_creationDate = $post->getCreationDate();
    $_postImg = $post->getPostImg();
    require('view/backend/adminPost.php');
}

/**
* Function = Affichage du Post avec ses données
 */
function updatePost(){
    $updatedPost = new Post;
    $updatedPost->setId($_POST['id']);
    $updatedPost->setTitle($_POST['title']);
    $updatedPost->setSubTitle($_POST['subtitle']);
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
    //require('view/backend/adminPost.php');
    header("Refresh: 1; URL=index.php?action=adminHome");
    throw new Exception('Les informations de l\'article ont bien été modifiées. <br>Vous allez être redirigé vers la Home de l\'administration.');
}

/**
 * Function = Suppression du post concerné
 */
function deletePost(){
    $postId = $_GET['id'];
    $manager = new PostManager();
    $manager->deletePost($postId);
    header("Refresh: 3; URL=index.php?action=adminHome");
    throw new Exception('Votre post a bien été supprimé. <br>Vous allez être redirigé vers la Home de l\'administration.');
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
            if ($type =="image/jpeg" || $type =="image/jpg" || $type =="image/png" && $size<= 1000000) {
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

/**
 * Function = Affichage des commentaires
 */
function adminComments(){
    $commentsManager = new CommentManager();
    $comments = $commentsManager->getListComments();
    $commentsReported = false;
    require('view/backend/adminComments.php');
}


/**
 * Function = Affichage des commentaires
 */
function adminCommentsReported(){
    $commentsManager = new CommentManager();
    $comments = $commentsManager->getListReported();
    $commentsReported = true;
    require('view/backend/adminComments.php');
}


/**
 * Function = Suppression du commentaire concerné
 */
function deleteComment(){
    $commentId = $_GET['id'];
    $commentsManager = new CommentManager();
    $commentsManager->deleteComment($commentId);
    header("Refresh: 3; URL=index.php?action=adminComments");
    throw new Exception('Votre commentaire a bien été supprimé. ');
}


/**
 * Function = Annuler le reporting du commentaire concerné
 */
function cancelReportingComment(){
    $commentId = $_GET['commentId'];
    $commentsManager = new CommentManager();
    $commentsManager->cancelReportingComment($commentId);
    header("Refresh: 3; URL=index.php?action=adminComments");
    throw new Exception('Le signalement de ce commentaire a bien été supprimé. ');
}

/**
 * Function = Déconnexion de l'Admin et suppression de la SESSION
 */
function deconnexion(){
    session_destroy();
    header("Refresh: 3; URL=index.php");
    throw new Exception('Vous avez été déconnecté de l\'administation.');
}