<?php $title = 'Home - Jean Forteroche'; ?>

<?php ob_start(); ?>

<section id="main-content">
    <section id="highlighted" class="col-12">
        <div class="highlighted_img_opacity"></div>
        <div id="highlighted_content">
            <h1>Billet simple pour l'alaska</h1>
            <h2>Le nouveau roman de Jean Forteroche</h2>
            <div class="arrow_content">
                <a class="spin circle container" href="#author_informations">
                    <div class="chevron"></div>
                    <div class="chevron"></div>
                    <div class="chevron"></div>
                </a>
            </div>
        </div>
    </section>
    <section id="author_informations" class="col-12">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-5">
                    <div class="author_photo_box ">
                        <div class="author_photo"></div>
                    </div>
                </div>
                <div class="author_description col-12 col-md-8 col-lg-7 ">
                    <h2 class="author_description_title title_decoration">À propos de l'auteur</h2>
                    <div class="author_description_content" >
                        <p>I'm Santa Claus! And I'm his friend Jesus. I videotape every customer that comes in here, so that I may blackmail them later. Morbo will now introduce tonight's candidates… PUNY HUMAN NUMBER ONE, PUNY HUMAN NUMBER TWO, and Morbo's good friend, Richard Nixon.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="chapters_list_home" class="col-12">                 
        <div class="container">
            <h2 class="title_decoration title_decoration_center">L'histoire commence ici</h2>
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
                                <a href="index.php?action=post&id=<?= $post->getId(); ?>"><?= htmlspecialchars($post->getTitle()) ?></a>
                            </h3>
                            <h4 class="chapter_subtitle"><?= htmlspecialchars($post->getSubTitle()) ?></h4>
                            <div class="chapter_description">
                                <?= nl2br($post->getContent()) ?>
                            </div>
                        </section>
                        <footer class="chapter_footer">
                            <span class="icon icon_comments">
                                <a href="index.php?action=post&id=<?= $post->getId(); ?>">Découvrir le chapitre</a>
                            </span>
                        </footer>
                    </article>
                </div>
                <?php endforeach; ?>    
            </div>
        </div>
        <div class="all_chapters justify-content-md-center">
            <a href="index.php?action=listPosts" class="btn btn-success col-8 col-md-3">Voir tous les chapitres</a>
        </div>
    </section> 
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>