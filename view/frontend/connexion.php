<?php $title = "Connexion - Jean Forteroche"; ?>

<?php ob_start(); ?>

<section id="main-content" class="connexion">
    <section id="highlighted" style="background-image: url('public/img/alaska3.jpg')">
        <div class="highlighted_img_opacity"></div>
        <div id="highlighted_content">
            <h1>Connexion</h1>
        </div>
    </section>
    <section class="connexion_form container">
        <form action="index.php?action=verifAdmin" method="post" class="col-12 offset-sm-3 col-sm-6">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Identifiant</span>
                </div>
                <input type="text" class="form-control" placeholder="" name="login" required value="">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Mot de passe</span>
                </div>
                <input type="password" class="form-control" placeholder="" name="password" required value="">
            </div>
            <div class="button row justify-content-md-center">
                <button type="submit" class="btn btn-primary col-6">Valider</button>
            </div>
        </form>
    </section>
</section>    

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
