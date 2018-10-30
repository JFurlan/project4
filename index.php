<?php

session_start();

/*
 * Autoload de chargement des classes
 */
spl_autoload_register(function ($class) {
    require_once 'model/' . $class . '.php';
});


require('controller/frontend.php');
require('controller/backend.php');

try{

    if (isset($_GET['action'])) {

        //si listPost, affichage de la home avec tous les posts
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        } 
        //si post, affichage de du post avec ses commentaires
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();

            } else {
                // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                header("Refresh: 3; URL=index.php");                
                throw new Exception('Aucun identifiant de billet envoyé. <br>Vous allez être redirigé vers la Home.');
            }
        }

        //si addComment, ajout du commentaire en BDD et affichage du post avec ses commentaires (et le nouveau)
        elseif ($_GET['action'] == 'addComment') {

            if (isset($_GET['id']) && $_GET['id'] > 0) {

                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);

                } else {
                    header("Refresh: 3; URL=index.php?action=post&id=".$_GET['id']."");
                    throw new Exception('Merci de remplir tous les champs.');
                }
            } 
            else {
                header("Refresh: 3; URL=index.php");
                throw new Exception('Aucun identifiant de billet envoyé. <br>Vous allez être redirigé vers la Home.');
            }
        }

        //Reporting du comment sélectionné
        elseif ($_GET['action'] == 'report') {
            if (isset($_GET['commentId']) && $_GET['commentId'] > 0) {
                reportingComment();
            }
            else{
                header("Refresh: 3; URL=index.php");
                throw new Exception('Aucun identifiant de commentaire envoyé. <br>Vous allez être redirigé vers la Home.');
            }
        }

        //si connect, ajout du formulaire de connexion
        elseif ($_GET['action'] == 'connect') {
            connexion();
        }

        //vérification admin après validation form de connexion
        elseif ($_GET['action'] == 'verifAdmin') {
            verifConnexion();
        }


        /**
         * INTERFACE ADMIN
         */

        elseif ($_GET['action'] == 'adminHome') {
            if(isset($_SESSION['login'])){
                adminHome();
            }
            else{
                header("Refresh: 3; URL=index.php");
                throw new Exception('Vous ne possédez pas les droits d\'accès à cette page. <br>Vous allez être redirigé vers la Home.');
            }
        }
        elseif ($_GET['action'] == 'adminNewPost') {
            if(isset($_SESSION['login'])){
                adminNewPost();
            }
            else{
                header("Refresh: 3; URL=index.php");
                throw new Exception('Vous ne possédez pas les droits d\'accès à cette page. <br>Vous allez être redirigé vers la Home.');
            }
        }
        elseif ($_GET['action'] == 'addPost') {
            if(isset($_SESSION['login'])){
                addPost();
            }
            else{
                header("Refresh: 3; URL=index.php");
                throw new Exception('Vous ne possédez pas les droits d\'accès à cette page. <br>Vous allez être redirigé vers la Home.');
            }
        }
        elseif ($_GET['action'] == 'adminEditPost') {
            if(isset($_SESSION['login'])){
                adminEditPost();
            }
            else{
                header("Refresh: 3; URL=index.php");
                throw new Exception('Vous ne possédez pas les droits d\'accès à cette page. <br>Vous allez être redirigé vers la Home.');
            }
        }
        elseif ($_GET['action'] == 'updatePost') {
            if(isset($_SESSION['login'])){
                updatePost();
            }
            else{
                header("Refresh: 3; URL=index.php");
                throw new Exception('Vous ne possédez pas les droits d\'accès à cette page. <br>Vous allez être redirigé vers la Home.');
            }
        }
        elseif ($_GET['action'] == 'deletePost') {
            if(isset($_SESSION['login'])){
                deletePost();
            }
            else{
                header("Refresh: 3; URL=index.php");
                throw new Exception('Vous ne possédez pas les droits d\'accès à cette page. <br>Vous allez être redirigé vers la Home.');
            }
        }
        elseif ($_GET['action'] == 'adminComments') {
            if(isset($_SESSION['login'])){
                adminComments();
            }
            else{
                header("Refresh: 3; URL=index.php");
                throw new Exception('Vous ne possédez pas les droits d\'accès à cette page. <br>Vous allez être redirigé vers la Home.');
            }
        }
        elseif ($_GET['action'] == 'adminCommentsReported') {
            if(isset($_SESSION['login'])){
                adminCommentsReported();
            }
            else{
                header("Refresh: 3; URL=index.php");
                throw new Exception('Vous ne possédez pas les droits d\'accès à cette page. <br>Vous allez être redirigé vers la Home.');
            }
        }
        elseif ($_GET['action'] == 'deleteComment') {
            if(isset($_SESSION['login'])){
                deleteComment();
            }
            else{
                header("Refresh: 3; URL=index.php");
                throw new Exception('Vous ne possédez pas les droits d\'accès à cette page. <br>Vous allez être redirigé vers la Home.');
            }
        }
        elseif ($_GET['action'] == 'cancelReport') {
            if(isset($_SESSION['login'])){
                cancelReportingComment();
            }
            else{
                header("Refresh: 3; URL=index.php");
                throw new Exception('Vous ne possédez pas les droits d\'accès à cette page. <br>Vous allez être redirigé vers la Home.');
            }
        }
        elseif ($_GET['action'] == 'deconnexion') {
            if(isset($_SESSION['login'])){
                deconnexion();
            }
            else{
                header("Refresh: 3; URL=index.php");
                throw new Exception('Vous ne possédez pas les droits d\'accès à cette page. <br>Vous allez être redirigé vers la Home.');
            }
        }
    } 
    else {
        listPosts();
    }
} 

catch (Exception $e) { // S'il y a eu une erreur, alors...
    require('view/frontend/errorView.php');
}