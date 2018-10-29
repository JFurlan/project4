<?php $title = 'Administration - Post'; ?>

<?php ob_start(); ?>
<?php require('view/backend/partials/navAdmin.php'); ?>

<h1>Welcome <?= strtoupper($_SESSION['login']);  ?></h1>

<?php foreach ($posts as $post) : ?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($post->getTitle()) ?>
        </h3>
        <p>
            <em>le <?= $post->getCreationDate() ?></em>
        </p>
        <p>
            <?= nl2br(htmlspecialchars($post->getContent())) ?>
        </p>
        <?php if($post->getPostImg()) : ?>
            <div>
                <p>Image de l'article : <a href="public/img/<?= $post->getPostImg() ; ?>" target="_blank"><?= $post->getPostImg() ; ?></a></p>
            </div>
        <?php endif; ?>
        <p>
            <a href="index.php?action=adminEditPost&id=<?= $post->getId() ?>" class="btn btn-success">Éditer</a>
        </p>
        <p>
            <a href="index.php?action=deletePost&id=<?= $post->getId() ?>" class="btn btn-error">Supprimer</a>
        </p>
    </div>
<?php endforeach; ?>

<?php $content = ob_get_clean(); ?>

<?php require('view/backend/template.php'); ?>