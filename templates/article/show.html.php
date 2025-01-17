<div class="article">
    <h3><?= $article['title'] ?></h3>
    <p><?= $article['content'] ?></p>
    <p>Auteur :  <?= $article['user_id'] ?></p>
    <a href="updateArticle.php?id=<?= $article['id'] ?>">Modifier</a>
    <a href="deleteArticle.php?id=<?= $article['id'] ?>">supprimer</a>


    <a href="index.php">Retour</a>
</div>

<!--
Permet de lire un article donc pas de boucle > on regarde qui est l'auteur avec le user_id
et comme ça permet de le modifier ou pas si pas l'auteur
-->