<?php
include_once 'DB.php';
session_start();
if (!(isset($_SESSION['user']) && $_SESSION['user'])) {
    header('location: login.php');
}

$check = '';
if (isset($_REQUEST['submit']) && !empty($_REQUEST['username']) && !empty($_REQUEST['password'])) {
    $username = $_REQUEST['username'];
    $password = password_hash($_REQUEST['password'], PASSWORD_DEFAULT);
    $db = DB::insertUser( $username , $password );
    if ($db) {
        $check = '<span>Eintrag erstellt</span>';
    } elseif (!$db){
        $check = '<span>Error</span>';
    }
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <title>Nutzer</title>
    <link rel="stylesheet" type="text/css" href="form.css"/>
    <!--        <script src="form.js"></script>-->
    <script src="js-library.js"></script>
</head>
<body>
<a href="main.php" class="link">Main</a>
<p class="check"><?= $check ?></p>

<form method="post" action="">
    <fieldset id="login-box">
        <legend id="login">Neuer Nutzer</legend>
        <p>
            <label for="login">Benutzername: </label>
            <input id="username" class="login" type="text" name="username" title="" maxlength="20"/>
            <!--required="required" --><!--pattern=".{3,20}" -->
        </p>
        <p>
            <label for="password">Passwort: </label>
            <input id="password" class="login" type="password" name="password" title=""/><!--pattern=".{6,}"-->
            <!--required="required"-->
        </p>
        <input type="submit" class="login" name="submit" value="Senden"/>
    </fieldset>
</form>
<table>
    <?php  $users = DB::selectUser('%');
    foreach ($users as $user) {  ?>
        <tr>
            <td><?php echo $user['id'] ?></td><td><?php echo $user['username'] ?></td>
        </tr>
    <?php } ?>
</table>
</body>
</html>

