<?php $title = "Error - Jean Forteroche"; ?>

<?php ob_start(); ?>

<section id="main-content" class="message">
    <section id="highlighted" style="background-image: url('public/img/alaska3.jpg')">
        <div class="highlighted_img_opacity"></div>
        <div id="highlighted_content">
            <h3><?= $e->getMessage(); ?></h3>
        </div>
    </section>
    
</section>    

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
