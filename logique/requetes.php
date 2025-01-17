<?php
require_once 'database.php'; //permet de faire appel au fichier qui contient la connexion à la database

//dans le fichier on met toutes les fonctions qui font appel à la base de donnée
function getArticles(): array //pas besoin de paramètre car prend tout les objets de la table
{
    $query = getPdo()->query("SELECT * FROM articles");
    $articles = $query->fetchAll();
    return $articles;
}

//valeur de retour > peut en avoir ou pas > si juste fonction renvoie des données
//seul moyen de fonctionner > prévoit de stocker ce qu'elle renvoie dans une variable

//faire de la doc
/**
 * @param $id
 * @return array $article
 */
function getArticle($id) : array | false //typer la valeur > la = array
{
    $query = getPdo()->prepare("SELECT * FROM articles WHERE id = :id");
    $query->execute([
        "id"=> $id
    ]); //vérifie les données qui passent entre les mains de l'utilisateurs avant de les renvoyer
    //jamais confiance à l'utilisateur
    $article = $query->fetch();
    return $article;
}

function deleteArticle($id) : int //valeur = integer
{
    $deleteQuery = getPdo()->prepare("DELETE FROM articles WHERE id = :id");
    $deleteQuery->execute([
        "id"=> $id
    ]);
    return $id;
}

function addArticle($article) : int
{
    $query = getPdo()->prepare("INSERT INTO articles (title, content, user_id) VALUES(:title, :content, :user_id)");
    $query->execute([
        'title' => $article['title'],
        'content' => $article['content'],
        'user_id' => $article['user_id']
    ]);

    $id = getPdo()->lastInsertId();
    return $id;
}

function updateArticle($article) : int
{
    $updateQuery = getPdo()->prepare(
        "UPDATE articles SET title = :title, content = :content WHERE id = :id"
    );

    $updateQuery->execute([
        "title" => $article['title'],
        "content" => $article['content'],
        "id" => $article['id']
    ]);
    return $article['id'];
}


/// Users

function getUserByUsername($username) : array
{
    $query = getPdo()->prepare("SELECT * FROM users WHERE username = :username");
    $query->execute([
        "username"=> $username
    ]);
    $user = $query->fetch();
    return $user;
}

function addUser($user) : int
{
    $user['password'] = password_hash($user['password'], PASSWORD_DEFAULT);

    $query = getPdo()->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
    $query->execute([
        "username"=> $user['username'],
        "password"=> $user['password']
    ]);

    return getPdo()->lastInsertId();  //permet de
}