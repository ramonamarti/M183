<?php
if(isset($_REQUEST['submit'])){
    if($_REQUEST['password']=='admin'&&$_REQUEST['username']=='admin'){
        session_start();
        $_SESSION['user']='admin';
    } else {
        header('location: login.php');
    }
} else {
    header('location: login.php');
}

?>

<a href="files.php">Dateien</a>
<a href="article.php">Artikel</a>
<a href="login.php?logout=true">Logout</a>
<?php
