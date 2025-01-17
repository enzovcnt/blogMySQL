<?php
session_start();

require_once("logique/requetes.php");

//pour delete besoin que de l'id
$id =null;
if(!empty($_GET['id']) && ctype_digit($_GET['id'])) { //vérifie que id est bien integer et existe
    $id = $_GET['id'];
}

if(!$id){
    header('Location: index.php');
}

$article = getArticle($id); //permet d'avoir l'article avec l'id

if(!$article){
    header('Location: index.php');
    exit();
}

deleteArticle($article['id']); //permet de delete le bon article car on a get son id avant

header('Location: index.php'); //redirige directement car rien a afficher
exit();