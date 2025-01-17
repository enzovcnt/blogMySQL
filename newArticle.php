<?php

session_start();
require_once 'logique/requetes.php';
require_once 'logique/response.php';
require_once 'logique/display.php';

if(empty($_SESSION["id"])){

    redirect("index", ["message"=>"please log in first"]);
}

$title = null;
$content=null;

if(!empty($_POST['title']) && !empty($_POST['content'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

}


if($title && $content) //une fois que les inputs sont remplies
{

    $newArticle = [
        "title" => $title,
        "content" => $content,
        "user_id" => $_SESSION["id"]
    ]; //tableau associatif > pourquoi en faire un ?

    $id =  addArticle($newArticle); //pourquoi mettre directement id quand on déclare la fonction

    redirect("article", ["id"=>$id]); //une fois article crée renvoie sur la page de l'article
} //passe un id pour qu'article fonctionne

render("article/new", [ //toujours l'affichage du html avec array = $data
    "pageTitle" => "New Article",
]);
