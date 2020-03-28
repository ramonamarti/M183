<?php
include_once 'DB.php';
session_start();
if(!(isset($_SESSION['user'])&&$_SESSION['user'])){
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
<a href="main.php" class="link">Main</a>

</body>
</html>
