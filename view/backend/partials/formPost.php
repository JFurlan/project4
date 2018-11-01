<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data"/>
    <div class="form_field">
        <input type="hidden" name="id" id="subtitle" class="form-control" placeholder="Id" value="<?php if (isset($id)) echo($id); ?>">
    </div>
    <div class="form_field">
        <label class="label_field" for="title">Titre</label>
        <input type="text" name="title" id="subtitle" class="form-control" placeholder="Titre" required value="<?php if (isset($_title)) echo($_title); ?>">
    </div>
    <div class="form_field">
        <label class="label_field" for="subtitle">Sous-titre</label>
        <input type="text" name="subtitle" id="subtitle" class="form-control" placeholder="Chapitre" required value="<?php if (isset($_subtitle)) echo($_subtitle); ?>">
    </div>
    <div class="form_field">
        <label class="label_field" for="content">Contenu de l'article</label>
        <textarea type="text" name="content" id="content" rows="10" class="form-control" placeholder="Contenu" id="contenu"><?php if (isset($_content)) echo($_content); ?></textarea>
    </div>
    <div class="form_field">
        <input type="hidden" class="form-control" id="subtitle" name="creationDate" type="date" placeholder="Date" required value="<?php if (isset($_creationDate)) echo($_creationDate); ?>">
    </div>
    <div class="form_field row justify-content-md-center">
        <div class="col-6">
            <label class="label_field">Image associée :</label>
            <?php if (isset($_postImg)) : ?>
                <img style="width: 100%; height: 200px;" src="public/img/<?= $_postImg; ?>" alt="">
            <?php endif; ?>
            <input class="form-control" name="img" placeholder="Aucune image associée" value="<?php if(isset($_postImg)){ echo($_postImg); }; ?>">
        </div>
        <div class="col-6">
            <p class="label_field">Ajoutez une nouvelle image :</p>
            <label class="label_field">Taille maximale : 1mo</label>
            <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
            <input type="file" class="form-control-file form-control border" name="postImg">
        </div>
    </div>
    <div class="form_field col-12 row justify-content-md-center no-gutters">
        <button type="submit" class="btn btn-success">Valider</button>
        <button type="button" class="btn btn-danger"><a href="index.php?action=adminHome">Annuler</a></button>
    </div>
    
</form>