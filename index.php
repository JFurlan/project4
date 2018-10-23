<?php

require('controller/frontend.php');

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
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }

        //si addComment, ajout du commentaire en BDD et affichage du post avec ses commentaires (et le nouveau)
        elseif ($_GET['action'] == 'addComment') {

            if (isset($_GET['id']) && $_GET['id'] > 0) {

                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);

                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            } 
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
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