<?php $title = 'Posts - Administration Jean Forteroche'; ?>

<?php ob_start(); ?>

<!-- <h1>Welcome <?php //strtoupper($_SESSION['login']);  ?></h1> -->
<section id="main-content" class="admin ">
    <section id="highlighted" class="col-12" style="background-image: url('public/img/alaska3.jpg')">
        <div class="highlighted_img_opacity"></div>
        <div id="highlighted_content">
            <h1>Édition de l'article</h1>
            <h2>Administration</h2>
        </div>
    </section>
    <section class="container">
        <div class="admin_form"> 
            <?php include('view/backend/partials/formPost.php'); ?>
        </div>
    </section>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('view/backend/template.php'); ?>