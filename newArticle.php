<?php

$host ="127.0.0.1";
$port = "3306";
$database = "blog base";
$username = "blogBaseAdmin";
$password = "IY4H389rYS[YMgKd";

$pdo = new PDO("mysql:host=localhost;dbname=$database", $username, $password, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);



if (!empty($_POST["textTitle"]) && ($_POST["contentText"]))
{
    $title = $_POST["textTitle"];
    $content = $_POST["contentText"];
}

$title = null;
$content = null;




$query = $pdo->prepare("INSERT INTO articles(title, content) VALUES (:content, :title)");
$query->execute([
        'title' => $title,
        'content' => $content
]);


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<form method="post">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Title</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="textTitle">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Content</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="contentText"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
