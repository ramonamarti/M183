<?php
session_start();
if(!(isset($_SESSION['user'])&&$_SESSION['user']=='admin')){
    header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <title>Artikel</title>
    <link rel="stylesheet" type="text/css" href="form.css" />
    <script src="js-library.js"></script>
</head>
<body>
<a href="files.php" class="link">Dateien</a>
<a href="article.php" class="link">Artikel</a>
<a href="login.php?logout=true" class="link logout">Logout</a>

</body>
</html>
