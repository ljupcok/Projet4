<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Edition</title>

    <script src="https://cdn.tiny.cloud/1/b0sw2nxgjnv73o2qieugie311hkox654mlgucm508eqzzqqt/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            toolbar_mode: 'floating',
        });
    </script>

</head>

<body>

    <div>
        <h3>Jean Forteroche</h3>
        <nav>
            <a>
                <h4>Page Admin</h4>
            </a>
            <a href="index.php">Home</a>
            <a href="index.php?action=listsBillets">Billets</a>
        </nav>
    </div>

    <section>
        <form method="POST" action="data.php">

            <h2>Titre</h2>
            <input type="text" name="titre" required=""><br />

            <h2>Contenu</h2>
            <textarea class="tinymce" id="mytextarea" name="contenu"></textarea><br />
            <input type="submit" name="submit" value="Publier" />
        </form>
    </section>

    <section id="edition">
        <ul>
            <li><a href="">billets</a>|
                <a href="">Modifier</a>
                | <a href="">Supprimer</a>
            </li>

        </ul>
    </section>
</body>

</html>