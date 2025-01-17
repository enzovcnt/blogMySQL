<?php

//redirection permet de rediriger si des erreurs
function redirect(string $page = null, array $urlParams = null) //paramétre pas obligatoire > valeur par défaut
{
    $urlEnd = "";

    if($urlParams) //confort > ce qu'on utilise le plus > complique pour rendre les choses plus simple à utiliser
    {
        $urlEnd = "?";
        foreach($urlParams as $paramName => $paramValue) //passe en tableau
        {
            $urlEnd .= $paramName . "=" . $paramValue . "&"; //écrit l'url
        }
        $urlEnd = substr($urlEnd, 0, -1); //enléve & mais pas très utile juste plus propre
    }
    if(!$page){$page = "index";} //permet de mettre comme page par défaut index

    header("Location: $page.php$urlEnd");//espace important > écrit une fois et évite erreur ou oublie
    exit(); //les pages se finissent toujours par .php
} //déclenche un truc
//cas le plus fréquent > on veut juste préciser quand ça change