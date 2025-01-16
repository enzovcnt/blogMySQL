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

$query = $pdo->query("SELECT * FROM articles");
$articles = $query->fetchAll();

//var_dump($articles);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
<hr>
<a href="newArticle.php" >nouvel article</a>
<hr>
<?php foreach ($articles as $article): ?>

    <hr>
    <div class="article">
        <h3><?= $article['title'] ?></h3>
        <p><?= $article['content'] ?></p>
        <a href="article.php?id=<?= $article['id'] ?>">Lire</a>
    </div>
    <hr>

<?php endforeach; ?>




</body>
</html>