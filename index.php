<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/Lib/functions.php';
    session_start();
?>

<?php if(isLoggedIn()) : $name = $_SESSION['login']; ?>
   You are logged in, <i><?= htmlspecialchars($name) ?></i>! Want to <a href="\Lib\logout.php">log out</a>?
<?php else : include 'Templates\home.html'; ?>
<?php endif; ?>