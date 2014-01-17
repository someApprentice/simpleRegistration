<?php
    require_once __DIR__ . '/Lib/functions.php';
    session_start();
?>

<?php if(isLoggedIn()) : $name = $_SESSION['login']; ?>
   You are logged in, <i><?= htmlspecialchars($name) ?></i>! Want to <a href="logout.php?go=index.php">log out</a>?
<?php else : include 'Templates\home.html'; ?>
<?php endif; ?>