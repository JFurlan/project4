<?php

// use \JF\Project4\Model\CommentManager;
// use \JF\Project4\Model\PostManager;

// require_once('model/PostManager.php');
// require_once('model/CommentManager.php'); 

/**
 * Function = récupération de tous les posts pour la Home
 */
function home(){

    $postManager = new PostManager();
    $posts = $postManager->getPostsHome();
    require('view/frontend/homeView.php');
}

/**
 * Function = récupération de tous les posts
 */
function listPosts(){

    $postManager = new PostManager();
    $posts = $postManager->getPosts();
    require('view/frontend/listPostsView.php');
}

/**
 * Function = récupération du post selon son id
 */
function post(){

    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
//var_dump($post);     
    $comments = $commentManager->getList($_GET['id']);
//var_dump($comments); 
    require('view/frontend/postView.php');
}

/**
 * Function = ajout de commentaire
 * @param int $postId
 * @param string $author
 * @param string $comment
 */
function addComment($postId, $author, $comment){

    $commentManager = new CommentManager();
    $author = htmlspecialchars($author);
    $comment = htmlspecialchars($comment);
    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        // Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
        throw new Exception("Impossible d\'ajouter le commentaire !");
    } else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

/**
 * Function = Verification admin or not
 */
function connexion(){
    require('view/frontend/connexion.php');
}


/**
 * Function = Verification admin or not
 */
function verifConnexion(){
    /*
     *  Récupération des données de SESSION
     */
        $login = $_POST['login'];
        $password = $_POST['password'];

    if(!empty($login) && (!empty($password))){
        $manager = new AdminManager();
        $connected = $manager->checkUser($login, $password);
        if($connected === null){
            header("Refresh: 3; URL=index.php?action=connect");
            throw new Exception('Votre identifiant et/ou votre mot de passe sont incorrects.<br><br>Réessayez.');
        }
        else{
            $_SESSION['login'] = $login;
            $_SESSION['password'] = $password;
            $_SESSION['role'] = "admin";
            header("Refresh: 0; URL=index.php?action=adminHome");
        }
    }
}

/**
 * Function = Suppression du commentaire concerné
 */
function reportingComment(){
    $postId = $_GET['id'];
    $commentId = $_GET['commentId'];
    $commentsManager = new CommentManager();
    $commentsManager->reportingComment($commentId);
    header('Refresh: 1; URL=index.php?action=post&id=' . $postId);
    throw new Exception('Le commentaire a bien été signalé. ');
}