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

</body>
</html>
