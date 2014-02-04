<?php
require_once __DIR__ . '/Lib/functions.php';
session_start();
?>

<?php if(isLoggedIn()) : $name = getName(); $token = getToken(); ?>
   You are logged in, <i><?= htmlspecialchars($name, ENT_QUOTES) ?></i>! Want to <a href="logout.php?token=<?= $token ?>&go=/index.php">log out</a>?
<?php else : include 'Templates/home.html'; ?>
<?php endif; ?>