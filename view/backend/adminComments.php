<?php $title = 'Administration - Comments'; ?>

<?php ob_start(); ?>
<?php require('view/backend/partials/navAdmin.php'); ?>

<h1>Welcome <?= strtoupper($_SESSION['login']);  ?></h1>

<p><a href="index.php?action=adminComments">Tous les commentaires</a></p>
<p><a href="index.php?action=adminCommentsReported">Tous les commentaires Signalés</a></p>

<?php foreach ($comments as $comment) : ?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($comment->getAuthor()) ?>
        </h3>
        <p>
            <em>le <?= $comment->getPostedDate() ?></em>
        </p>
        <p>
            <?= nl2br(htmlspecialchars($comment->getComment())) ?>
        </p>
        <p>
            <em><?= ($comment->getStatut() === "1") ? "Signalé" : "Posté"; ?></em>
        </p>
        <p>
            <a href="index.php?action=deleteComment&id=<?= $comment->getId() ?>" class="btn btn-error">Supprimer</a>
        </p>
        <p>
            <a href="index.php?action=cancelReport&commentId=<?= $comment->getId() ?>" class="btn btn-error">Annuler le signalement</a>
        </p>
    </div>
<?php endforeach; ?>

<?php $content = ob_get_clean(); ?>

<?php require('view/backend/template.php'); ?>