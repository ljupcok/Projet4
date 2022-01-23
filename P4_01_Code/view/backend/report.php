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
            <a href="indexAdmin.php">Home Admin</a>


        </nav>
    </div>

    <div>
        <section>
            <h3>Voici la liste des commentaires signalés:</h3>
            <?php if (isset($reportedComments) && $reportedComments > 0) : ?>
                <?php for ($i = 0; $i < count($reportedComments); $i++) : ?>
                    <table>
                        <tr>
                            <td>Auteur du commentaire: <?= $reportedComments[$i]['author'] ?> </td>
                            <td>Commentaire: <?= $reportedComments[$i]['content'] ?></a>
                            <td>Nombre de signalement: <?= $reportedComments[$i]['count_report'] ?></a>
                            </td>
                            <td><a href="indexAdmin.php?action=deleteComment&id_comment=<?= $reportedComments[$i]['id_comment'] ?>">Supprimer</a></td>
                            <td><a href="indexAdmin.php?action=deleteReport&id_comment=<?= $reportedComments[$i]['id_comment'] ?>">Garder le commentaire</a></td>
                        </tr>
                    </table>
                <?php endfor ?>
            <?php else : ?>
                <p>Il n'a pas de commentaire signalé</p>
            <?php endif ?>
        </section>
    </div>


</body>

</html>