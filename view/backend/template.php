<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="../../public/styles/css" rel="stylesheet" /> 
    </head>
        
    <body>
    <?php //var_dump($_SESSION); ?>
        <a href="index.php?action=connect">Connexion</a>
        <?= $content ?>
    </body>
</html>