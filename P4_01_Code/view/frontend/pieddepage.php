<footer id="pied-page">
    <p>Copyright, tous droits réservés</p>
    <?php if (isset($_SESSION['LOGGED_ADMIN'])) : ?>
        <p>Bienvenue <?php echo $_SESSION['LOGGED_ADMIN']; ?></p>
        <a href="indexAdmin.php">Retour sur la page Admin</a>
        <a href="indexAdmin.php?action=signOut">Se deconnecter</a>
    <?php else : ?>
        <a href="indexAdmin.php" class="text-white">Se connecter</a>
    <?php endif ?>
</footer>