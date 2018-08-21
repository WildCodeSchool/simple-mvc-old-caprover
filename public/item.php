<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Simple MVC</title>

    <link rel="stylesheet" href="/assets/css/styles.css">
    <link rel="icon" href="/assets/images/favicon.png">
</head>

<?php
// connection BDD (définir les constantes dans un fichier connec.php qui sera inclus)
require '../app/connec.php';
$pdo = new \PDO(DSN, USER, PASS);

// requete SQL 
$query = "SELECT * FROM item";
$res = $pdo->query($query);
$items = $res->fetchAll();
?>

<!-- affichage des articles récupérés par la requête SQL -->
<body>
    <section>
        <h1>Les articles</h1>
        <ul>
        <?php foreach ($items as $item) : ?>
            <li><?= $item['title'] ?></li>
        <?php endforeach ?>
        </ul>
    </section>
</body>
</html>
