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
        <h3>Bienvenue Jean Forteroche</h3>
        <nav>
            <a>
                <h4>Page Admin</h4>
            </a>
            <a href="index.php">Home</a>
            <a href="index.php?action=postsLists">billets</a>
            <a href="indexAdmin.php?action=listPost">Modération des billets</a>
            <a href="indexAdmin.php?action=viewAddPost">Ajouter des billets</a>
            <a href="indexAdmin.php?action=reportedList">Commentaire signalé</a>

        </nav>
    </div>



</body>

</html>