<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        #report {
            background-color: #ff000024;
        }
    </style>
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

    <h1>billet pour l'Alaska</h1>
    <h2> <?= $data[0]["title"] ?> </h2>

    <article>
        <p>Publié le<?= $data[0]['date_creation'] ?></p>
        <div>
            <p><?= $data[0]["content"] ?><br><br></p>
        </div>
    </article>

    <h3> Commentaires:</h3>
    <section>
        <h5>Laisser un commentaire</h5>
        <form method="post" action="index.php?action=addComment&id=<?= $_GET['id'] ?>">
            <div>
                <label for=author>Votre pseudo </label>
                <input type="text" name="author" placeholder="Pseudo" required="">
            </div>
            <div>
                <label for=content>Votre commentaire</label>
                <textarea name="content" placeholder="Commentaire"></textarea>
            </div>
            <?php if (!empty($_GET['error'])) {
                echo '<p>Il manque un des champs à remplir</p>';
            } ?>
            <div>
                <button type="submit" name="submit_comment">Envoyer</button>
            </div>
        </form>
    </section>
    <section>
        <div>
            <h3>Vos commentaires:</h3>
            <?php if ($data[0]['comment'] !== null) : ?>
                <?php for ($i = 0; $i < count($data); $i++) : ?>
                    <p><?= $data[$i]['author'] ?></p>
                    <p><?= $data[$i]['comment'] ?></p><br>
                    <a href="index.php?action=report&id=<?= $_GET['id'] ?>&id_comment=<?= $data[$i]['id'] ?>">Signalé</a>
                <?php endfor; ?>
            <?php else : ?>
                <p>Soyez le premier a commenter.</p>
            <?php endif; ?>
        </div>
    </section>

</body>

</html>