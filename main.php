<?php

$hashed = password_hash('admin', PASSWORD_DEFAULT);
if (isset($_REQUEST['submit'])) {
    if (password_verify($_REQUEST['password'], $hashed)
        && $_REQUEST['username'] == 'admin') {
        session_start();
        $_SESSION['user'] = 'admin';
    } else {
        header('location: login.php');
    }
} else {
    header('location: login.php');
}

?>

    <!DOCTYPE html>
    <html lang="de">
    <head>
        <title>Main</title>
        <link rel="stylesheet" type="text/css" href="form.css"/>
        <script src="js-library.js"></script>
    </head>
    <body>
    <a href="files.php" class="link">Dateien</a>
    <a href="article.php" class="link">Artikel</a>
    <a href="newuser.php" class="link logout">Neuer Nutzer</a>
    <a href="login.php?logout=true" class="link logout">Logout</a>

    </body>
    </html>
<?php
