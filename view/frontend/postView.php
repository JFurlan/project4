<?php $title = $post->getTitle() . " - Jean Forteroche"; ?>

<?php ob_start(); ?>

<section id="main-content" class="chapter_detail">
    <section id="highlighted" style="background-image: url('public/img/<?= $post->getPostImg(); ?>')">
        <div class="highlighted_img_opacity"></div>
        <div id="highlighted_content">
            <h1><?= htmlspecialchars($post->getTitle()) ?></h1>
            <h2><?= htmlspecialchars($post->getSubTitle()) ?></h2>
        </div>
    </section>
    <?php 
        $fullDate = strftime($post->getCreationDate());
        $date = DateTime::createFromFormat('Y-m-d H:i:s', $fullDate);
    ?>
    <section class="chapter_description container">
        <article class="chapter chapter_full">
            <section class="chapter_body">
                <div class="chapter_body_head">
                    <div class="chapter_body_date_creation">Publié le <?= $date->format('d/m/Y'); ?></div>
                    <span class="icon icon_comments">
                        <a href="#comments">
                            <i class="far fa-comment-dots"></i>
                            <?= count($comments); ?> commentaires
                        </a>
                    </span>
                </div>
                <div class="chapter_description">
                    <?= nl2br($post->getContent()) ?>
                </div>
            </section>
        </article>
    </section>
    <section id="comments" class="chapter_description col-md-12">
        <div class="container">
            <header>
                <h2 class="title_decoration title_decoration_center">Commentaires</h2>
            </header>
            <div class="row">
                <div class="col-md-7 bloc_comments_details">
                    <?php if(count($comments) == 0) : ?>
                        <p>Aucun commentaire pour ce chapitre.</p>
                    <?php else : ?>    
                        <?php foreach ($comments as $comment) : ?>
                            <?php 
                                $fullDateComment = $comment->getPostedDate();
                                $date = DateTime::createFromFormat('Y-m-d H:i:s', $fullDateComment);
                            ?>
                            <aside class="comments_details">
                                <div class="comments_pseudo">
                                    <p><?= htmlspecialchars($comment->getAuthor()) ?></p>
                                </div>
                                <p class="comments_statut far <?= ($comment->getStatut() == 0) ? "publish fa-check-circle" : "reported fa-times" ; ?>">
                                    Commentaire <?= ($comment->getStatut() == 0) ? "publié" : "signalé" ; ?>
                                </p>
                                <div class="comments_creation">
                                    <p>Publié le <?= $date->format('d/m/Y'); ?> à <?= $date->format('H:i:s'); ?></p>
                                </div>
                                <div class="comments_content title_decoration">
                                    <p><?= nl2br(htmlspecialchars($comment->getComment())) ?></p>
                                </div>
                                <div class="comments_reported">
                                    <a title="Signaler le commentaire" href="index.php?action=report&id=<?= $post->getId(); ?>&commentId=<?= $comment->getId(); ?>" class="comment_signal far fa-bookmark <?= ($comment->getStatut() == 0) ? "publish" : "reported" ; ?>"></a>
                                </div>
                            </aside>
                        <?php endforeach; ?> 
                    <?php endif; ?>     
                </div>
                <div class="col-md-5 bloc_comments_add">
                    <div class="add_comment">
                        <h4 class="add_comment_title title_decoration title_decoration_center">Laissez votre commentaire</h4>
                        <form action="index.php?action=addComment&amp;id=<?= $post->getId() ?>" method="post" class="add_comment_form" >
                            <input type="text" id="author" name="author" class="form_comment_pseudo" placeholder="Votre Pseudo" required>
                            <textarea class="form_comment_content" id="comment" name="comment" rows="10" placeholder="Votre Commentaire" required></textarea>
                            <input type="submit" class="form_comment_submit" value="Ajouter un commentaire">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
