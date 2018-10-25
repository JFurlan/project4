<?php $title = "Connexion - Jean Forteroche"; ?>

<?php ob_start(); ?>

    <div class="col-lg-12">
        <div class="main">
                <h1>Page de connexion </h1>
                <form action="index.php?action=verifAdmin" method="post">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Identifiant</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Identifiant" name="login" required value="">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Mot de passe</span>
                        </div>
                        <input type="password" class="form-control" placeholder="Mot de passe" name="password" required value="">
                    </div>
                    <div class="button">
                        <br />
                        <button type="submit" class="btn btn-primary">Valider</button>
                    </div>
                </form>
        </div>
    </div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
