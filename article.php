<?php
session_start(); //permet de commencer un session pour que php se souvienne de nous

require_once("logique/requetes.php");
require_once("logique/display.php");
require_once("logique/response.php"); //on fait appel aux fichiers que l'on veut utiliser
                                        // permet d'utiliser les variables stockées dedans

$id =null;
if(!empty($_GET['id']) && ctype_digit($_GET['id'])) {
    $id = $_GET['id'];
}

if(!$id){
    redirect();  //fonction dans response.php > permet de gérer les erreurs
}

$article = getArticle($id); //fonction dans requete.php > pour utiliser la base de donnée

if(!$article){redirect();} //si pas d'article alors renvoie sur index

render("article/show", [ //affiche l'article
    "article" => $article, //pas besoin de préciser id/title/content car le fait déjà dans les templates juste besoin de svoir ce qu'est $article
    "pageTitle" => $article["title"], //pageTitle se trouve dans base.html = juste le titre dans l'onglet
]);

//retrouve les string pour le template et l'array pour la data qui va être utilisé