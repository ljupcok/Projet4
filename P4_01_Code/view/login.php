<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
</head>

<body>
    <h2>Connexion:</h2>
    <form action="index.php?action=connect" method="POST">
        <p>
            <label>Pseudo</label> : <input type="text" name="pseudo" /><br />
            <label>Mot de passe</label> : <input type="password" name="pass" /><br />

            <input type="submit" value="Envoyer" />
        </p>
    </form>
    <?php
    if (!empty($_GET['error'])) {
        switch ($_GET['error']) {
            case 1:
                echo '<p>Mot de passe ou identifiant false</p>';
                break;
            case 2:
                echo '<p>Veuillez remplir le formulaire</p>';
                break;
        }
    }

    ?>
    <p><a href="index.php">Retour</a></p>

</body>

</html>