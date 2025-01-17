<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $pageTitle ?></title>
</head>
<body>
<?php if(!empty($_GET["message"])){ ?>

    <hr>
    <hr>
    <?= $_GET["message"] ?>

    <hr>
    <hr>
<?php } ?>

<!--  -->
<hr>
<a href="index.php">Accueil</a>

<a href="newArticle.php">nouvel article</a>
<a href="signIn.php">Sign In</a>
<a href="signUp.php">Sign Up</a>
<a href="signOut.php">Sign Out</a>
<h4><?php
    if(isset($_SESSION["username"])){
        echo $_SESSION["username"];
    }

    ?></h4>
<hr>
<!-- permet d'afficher la base du html avec la navbar qui nee bouge pas mais aussi afficher
 le compte qui est connecté
 -->

<?= $pageContent ?> <!-- vient de render > là où doit d'afficher les données -->


</body>
</html>