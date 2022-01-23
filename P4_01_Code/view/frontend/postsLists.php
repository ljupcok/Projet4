<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Jean Forteroche</title>

    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>
    <header>
        <div>
            <h3>Jean Forteroche</h3>
            <nav>
                <a href="index.php">Home</a>
                <a href="index.php?action=postsLists">billets</a>
            </nav>
        </div>
    </header>

    <section>
        <div>
            <h1>Bienvenue sur mon blog.</h1>
            <p>post simple pour l'Alaska : découvrez mon nouveau roman en ligne !</p>
        </div>
    </section>

    <section>
        <div>
            <div>
                <?php
                for ($i = 0; $i < count($posts); $i++) {
                ?>
                    <h2><?= $posts[$i]['title'] ?></h2>
                    <p>Publié le <?= $posts[$i]['date_creation'] ?></p>
                    <p><?php
                        $text = $posts[$i]['content'];
                        echo substr($text, 0, 100);
                        ?>[...]</p>
                    <a href="index.php?action=billet&amp;id=<?= $posts[$i]["id"] ?>" title="suite de l'article" role="button">Lire la suite</a>
                <?php
                }
                ?>
            </div>
        </div>
    </section>
</body>