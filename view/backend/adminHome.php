<?php $title = 'Administration - Jean Forteroche'; ?>

<?php ob_start(); ?>

<!-- <h1>Welcome <?php //strtoupper($_SESSION['login']);  ?></h1> -->

<section id="main-content" class="admin ">
    <section id="highlighted" style="background-image: url('public/img/alaska3.jpg')">
        <div class="highlighted_img_opacity"></div>
        <div id="highlighted_content">
            <h1>Tous les articles</h1>
            <h2>Administration</h2>
        </div>
    </section>
    <section class="container">
        <div class="admin_list"> 
        <?php foreach ($posts as $post) : ?>
        <?php 
            $fullDate = $post->getCreationDate();
            $date = DateTime::createFromFormat('Y-m-d H:i:s', $fullDate);
        ?>   
            <div class="post bloc row justify-content-between">
                <div class="col bloc_content">
                    <h3 class="bloc_element"><?= htmlspecialchars($post->getTitle()) ?></h3>
                    <h4 class="bloc_element"><?= htmlspecialchars($post->getSubTitle()) ?></h4>
                    <p class="bloc_element"><em>Le <?= $date->format('d/m/Y'); ?></em></p>
                    <div class="bloc_element content"><?= nl2br($post->getContent()) ?></div>
                </div> 
                <div class="col-2 bloc_button row align-items-center no-gutters">
                    <p>
                        <a href="index.php?action=adminEditPost&id=<?= $post->getId() ?>" class="btn btn-success">Éditer</a>
                    </p>
                    <p>
                        <a href="index.php?action=deletePost&id=<?= $post->getId() ?>" class="btn btn-danger">Supprimer</a>
                    </p>
                </div>
                
            </div>
        <?php endforeach; ?>
    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('view/backend/template.php'); ?>