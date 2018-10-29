<?php $title = 'Administration - Post'; ?>

<?php ob_start(); ?>
<?php require('view/backend/partials/navAdmin.php'); ?>

<h1>Welcome <?= strtoupper($_SESSION['login']);  ?></h1>

<?php include('view/backend/partials/formPost.php'); ?>

<?php $content = ob_get_clean(); ?>

<?php require('view/backend/template.php'); ?>