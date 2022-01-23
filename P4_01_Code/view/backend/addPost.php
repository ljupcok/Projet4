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
            <a href="indexAdmin.php">Home Admin</a>
        </nav>
    </div>

    <section>
        <form method="post" action="indexAdmin.php?action=addPost">

            <label for='title '>Titre</label>
            <input type="text" name="title" required=""><br />

            <label for='content'>Contenu</label>
            <textarea class="tinymce" id="mytextarea" name="content"></textarea><br />
            <?php if (!empty($_GET['error'])) {
                echo '<p>un des champs n\'est pas rempli</p>';
            } ?>
            <input type="submit" name="submit" value="Publier" />
        </form>
    </section>
    <script src="public/js/tinymce.js"></script>

</body>

</html>