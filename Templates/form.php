<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <link rel='stylesheet' type='text/css' href='stylesheet.css'/>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
</head>
<body>
<div id="wrapper">
    <form method="post" name="registrationForm" action="/Lib/registration.php?go=index.php">
        Login: <input type="text" name="login" value="<?= htmlspecialchars($login)?>">
        <?php if($errors['login'] != "") : ?>
            <span style='color:red;'><?= $errors['login'] ?></span>
        <?php endif; ?>
        <br>

        Password: <input type="password" name="password" value="">
        <?php if ($errors['password'] != "") : ?>
            <span style='color:red;'><?= $errors['password'] ?></span>
        <?php endif; ?>
        <br>

        Retry Password: <input type="password" name="retryPassword" value="">
        <?php if ($errors['retryPassword'] != "") : ?>
            <span style='color:red;'><?= $errors['retryPassword'] ?></span>
        <?php endif; ?>
        <br>
        <input type="submit" name="signUp" value="Register me!">
    </form>
</div>
</body>
</html>