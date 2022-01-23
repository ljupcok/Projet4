<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Edition</title>

    <script src="https://cdn.tiny.cloud/1/b0sw2nxgjnv73o2qieugie311hkox654mlgucm508eqzzqqt/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

</head>

<body>

    <div>
        <h3>Jean Forteroche</h3>
        <nav>
            <a>
                <h4>Page Admin</h4>
            </a>
            <a href="index.php">Home</a>
            <a href="index.php?action=postsLists">billets</a>
            <!--TODO changer listspost= listpost-->
            <a href="indexAdmin.php">Home Admin</a>
        </nav>
    </div>
    <div>
        <ul>
            <?php for ($i = 0; $i < count($posts); $i++) { ?>
                <li><a href="index.php?action=billet&id=<?= $posts[$i]['id'] ?>"><?= $posts[$i]['title'] ?></a>|
                    <a href="indexAdmin.php?action=editPost&id=<?= $posts[$i]['id'] ?>">Modifier</a>
                    <a href="indexAdmin.php?action=deletePost&id=<?= $posts[$i]['id'] ?>">Supprimer</a>
                </li>
            <?php } ?>

        </ul>
    </div>

</body>

</html>