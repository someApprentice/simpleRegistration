<?php
require_once __DIR__ . '/Lib/functions.php';
?>

<?php if(isLoggedIn()) : ?>
    <?php
    $name = getName();
    $token = getToken();
    ?>

   You are logged in, <i><?= htmlspecialchars($name, ENT_QUOTES) ?></i>! Want to <a href="logout.php?token=<?= $token ?>&go=/index.php">log out</a>?
<?php else : include 'Templates/home.html'; ?>
<?php endif; ?>