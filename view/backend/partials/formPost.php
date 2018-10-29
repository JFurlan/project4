<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data"/>
<div>
    <input type="hidden" name="id" class="form-control" placeholder="Id" value="<?php if (isset($id)) echo($id); ?>">
</div>
<br/>
<div>
    <input type="text" name="title" class="form-control" placeholder="Chapitre" required value="<?php if (isset($_title)) echo($_title); ?>">
</div>
<br/>
<div>
        <textarea type="text" name="content" rows="10" class="form-control" placeholder="Contenu" id="contenu"><?php if (isset($_content)) echo($_content); ?></textarea>
</div>
<br/>
<div>
    <input type="hidden" class="form-control" name="creationDate" type="date" placeholder="Date" required value="<?php if (isset($_creationDate)) echo($_creationDate); ?>">
</div>
<br/>
<div>
    <label>Image associée :</label>
    <?php if (isset($_postImg)) : ?>
        <img style="width: 100%; height: 200px;" src="public/img/<?= $_postImg; ?>" alt="">
    <?php endif; ?>
    <input class="form-control" name="img" placeholder="Aucune image associée" value="<?php if(isset($_postImg)){ echo($_postImg); }; ?>">
</div>
<br/>
<div>
    <p>Ajoutez une nouvelle image :</p>
    <label>Taille maximale : 1mo</label>
    <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
    <input type="file" class="form-control-file border" name="postImg">
</div>
<div class="button">
    <br/>
    <button type="submit" class="btn btn-primary">Envoyer</button>
    <button type="button" class="btn btn-danger"><a href="index.php?action=adminHome">Annuler</a></button>
</div>
</form>