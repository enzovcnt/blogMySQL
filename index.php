<?php
require_once 'logique/requetes.php';
require_once "logique/display.php"; //toujours l'appel aux autres fichiers dont on a besoin
                                    //d'ailleurs pas de require_once"logique/database.php"
                                    //le fait déjà dans requête
session_start();

$articles = getArticles(); //on cherche à get tous les articles donc pas besoin d'id spécifique

render("article/index", [ //pareil que dans article.php
    "pageTitle" => "Accueil",
    "articles" => $articles
]);
