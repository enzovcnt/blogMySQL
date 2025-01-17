<?php
//fonction qui permet d'afficher les templates sans avoir à écrire de html
//render est la fonction qui permet d'afficher les templates > jamais on va appeler un template comme ça
//si on veut un template il faut mettre sa route dans render
function render(string $templateName, array $data = null) //array = la data que l'on veut afficher dans la page base.html
{


    extract($data); //permet de prendre un tableau associatif et de créer de vrai variable avec

    ob_start(); //avec ceci on initialise l'affichage mais on lui demande de ne pas tout afficher directement
                    //on lui fait charger les templates et la base pour que les informations puissent s'afficher en suivant le html
    require_once "templates/$templateName.html.php";

    $pageContent =  ob_get_clean();


    ob_start();

    require_once "templates/base.html.php";

    echo ob_get_clean(); //affiche le html

//buffering = mémoire tampon

}