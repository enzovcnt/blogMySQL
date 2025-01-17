<?php
require_once("logique/response.php");
unset($_SESSION['id']); //efface id et username de la session pour se déconnecter
unset($_SESSION['username']);
//header("location: index.php?message=logged out");
//plus header mais redirect()
redirect("index", ["message" => "logged out"]);
//exit();