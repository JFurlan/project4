<?php $title = 'Comments - Administration Jean Forteroche '; ?>

<?php ob_start(); ?>

<!-- <h1>Welcome <?php //var_dump($commentsReported);  ?></h1> -->

<section id="main-content" class="admin ">
    <section id="highlighted" style="background-image: url('public/img/alaska3.jpg')">
        <div class="highlighted_img_opacity"></div>
        <div id="highlighted_content">
            <h1>Tous les commentaires</h1>
            <h2>Administration</h2>
        </div>
    </section>
    <section class="container">
        <div class="admin_list"> 
            <div class="row justify-content-md-center">
                <p><a href="index.php?action=adminComments" class="type_comments <?= ($commentsReported == false) ? "showed" : "";  ?>">Tous les commentaires</a></p>
                <p><a href="index.php?action=adminCommentsReported" class="type_comments <?= ($commentsReported == true) ? "showed" : "";  ?>">Commentaires Signalés</a></p>
            </div>
            <?php foreach ($comments as $comment) : ?>
            <?php 
                $fullDate = $comment->getPostedDate();
                $date = DateTime::createFromFormat('Y-m-d H:i:s', $fullDate);
            ?> 
            <div class="post bloc row justify-content-between">
                <div class="col-12 col-sm-10 bloc_content">
                    <h3 class="bloc_element"><?= htmlspecialchars($comment->getAuthor()) ?></h3>
                    <p class="bloc_element"><em>Le <?= $date->format('d/m/Y'); ?></em></p>
                    <p class="bloc_element <?= ($comment->getStatut() === "1") ? "reported" : "publish"; ?>"><em><?= ($comment->getStatut() === "1") ? "Signalé" : "Posté"; ?></em></p>
                    <p class="bloc_element content"><?= nl2br(htmlspecialchars($comment->getComment())) ?></p>
                </div> 
                <div class="col-12 col-sm-2 bloc_button row align-items-center no-gutters">
                    <p><a href="index.php?action=deleteComment&id=<?= $comment->getId() ?>" class="btn btn-danger">Supprimer</a></p>
                    <?php if($comment->getStatut() === "1") : ?>
                        <p><a href="index.php?action=cancelReport&commentId=<?= $comment->getId() ?>" class="btn btn-warning">Re-publier</a></p>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('view/backend/template.php'); ?>