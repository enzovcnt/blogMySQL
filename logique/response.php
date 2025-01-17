<?php

//redirection permet de rediriger si des erreurs
function redirect(string $page = null, array $urlParams = null)
{
    $urlEnd = "";

    if($urlParams)
    {
        $urlEnd = "?";
        foreach($urlParams as $paramName => $paramValue)
        {
            $urlEnd .= $paramName . "=" . $paramValue . "&";
        }
        $urlEnd = substr($urlEnd, 0, -1);
    }
    if(!$page){$page = "index";} //permet de mettre comme page par défaut index

    header("Location: $page.php$urlEnd");
    exit();
}