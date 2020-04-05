<?php
include_once 'DB.php';
session_start();
if(!(isset($_SESSION['user'])&&$_SESSION['user'])){
    header('location: login.php');
}
$ls = '';
$os = $_SERVER['HTTP_USER_AGENT'];
ob_start();
if(strpos(strtolower($os),'win')){
    $os = 'Optionen für Windows dir Befehl nutzen';
    if (isset($_REQUEST['submit']) && !empty($_REQUEST['options'])) {
        $options = $_REQUEST['options'];
        system(escapeshellcmd('dir '.$options));

    } else if (isset($_REQUEST['submit']) ) {
        system(escapeshellcmd('dir'));
    }
} else{
    $os = 'Optionen für Unix ls Befehl nutzen';
    if (isset($_REQUEST['submit']) && !empty($_REQUEST['options'])) {
        $options = $_REQUEST['options'];
        system(escapeshellcmd('ls '.$options));

    } else if (isset($_REQUEST['submit']) ) {
        system(escapeshellcmd('ls'));
    }
}
$ls = ob_get_clean();

?>
<!DOCTYPE html>
<html lang="de">
<head>
    <title>Datein</title>
    <link rel="stylesheet" type="text/css" href="form.css" />
    <script src="js-library.js"></script>
</head>
<body>
<a href="main.php" class="link">Main</a>
<form method="post" action="">
    <fieldset id="file-box">
        <legend id="file">Liste Dateien auf</legend>
        <p><?php echo $os ?></p>
        <p>
            <label for="options">Optionen: </label>
            <input id="options" class="file" type="text" name="options" title=""/><!--pattern=".{6,}"-->
            <!--required="required"-->
        </p>
        <input type="submit" class="file" name="submit" value="Senden"/>
    </fieldset>
</form>
<?php
print_r(nl2br($ls));
?>
</body>
</html>
