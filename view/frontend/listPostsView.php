<?php $title = 'Chapitres - Jean Forteroche'; ?>

<?php ob_start(); ?>

<section id="main-content" class="chapters_page">
    <section id="highlighted" class="col-12">
        <div class="highlighted_img_opacity"></div>
        <div id="highlighted_content">
            <h1>Liste des chapitres</h1>
        </div>
    </section>
    <section id="chapters_list" class="col-12">
        <div class="container">
            <div class="row">
                <?php foreach ($posts as $post) : ?>
                <?php 
                    $fullDate = $post->getCreationDate();
                    $date = DateTime::createFromFormat('Y-m-d H:i:s', $fullDate);
                ?>
                <div class="col-12 col-sm-6">
                    <article class="chapter chapter_mini">
                        <header class="chapter_thumb">
                            <a href="index.php?action=post&id=<?= $post->getId(); ?>">
                                <img src="public/img/<?= $post->getPostImg(); ?>">
                            </a>
                        </header>
                        <section class="chapter_date">
                            <span class="chapter_date_day"><?= $date->format('d'); ?></span>
                            <span class="chapter_date_month"><?= $date->format('M'); ?></span>
                        </section>
                        <section class="chapter_body">
                            <h3 class="chapter_title">
                                <a href="index.php?action=post&id=<?= $post->getId(); ?>"><?= $post->getTitle() ?></a>
                            </h3>
                            <h4 class="chapter_subtitle"><?= $post->getSubTitle() ?></h4>
                            <div class="chapter_description">
                                <?= nl2br($post->getContent()) ?>
                            </div>
                        </section>
                        <footer class="chapter_footer">
                            <span class="icon icon_comments">
                                <a href="index.php?action=post&id=<?= $post->getId(); ?>"></i>Découvrir le chapitre</a>
                            </span>
                        </footer>
                    </article>
                </div>    
                <?php endforeach; ?>
            </div>
        </div>
    </section> 
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>