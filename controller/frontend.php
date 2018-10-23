<?php

use \JF\Project4\Model\CommentManager;
use \JF\Project4\Model\PostManager;

require_once('model/PostManager.php');
require_once('model/CommentManager.php'); 

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
    $comments = $commentManager->getComments($_GET['id']);

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

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        // Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
        throw new Exception("Impossible d\'ajouter le commentaire !");
    } else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}