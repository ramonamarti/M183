<?php
include_once 'DB.php';
session_start();
if (!(isset($_SESSION['user']) && $_SESSION['user'])) {
    header('location: login.php');
}

$checkins = '';
if (isset($_REQUEST['submitins']) && !empty($_REQUEST['name'])) {
    $name = $_REQUEST['name'];
    $db = DB::insertArticle($name);
    if ($db) {
        $checkins = '<span>Eintrag erstellt</span>';
    } elseif (!$db) {
        $checkins = '<span>Error</span>';
    }
}

$checkdel = '';
if (isset($_REQUEST['submitdel']) && !empty($_REQUEST['aid'])
    || isset($_REQUEST['aid']) && !empty($_REQUEST['aid'])) {
    $aid = $_REQUEST['aid'];
    if(intval($aid)){
        $db = DB::deleteArticle($aid);
        if ($db) {
            $checkdel = '<span>Eintrag gelöscht</span>';
        } elseif (!$db) {
            $checkdel = '<span>Error</span>';
        }
    } else {
        $checkdel = '<span>Falsche Eingabe</span>';
    }
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <title>Artikel</title>
    <link rel="stylesheet" type="text/css" href="form.css"/>
    <script src="js-library.js"></script>
</head>
<body>
<a href="main.php" class="link">Main</a>
<form method="post" action="">
    <fieldset id="article-box">
        <legend id="article">Finde Artikel</legend>
        <p>
            <label for="search">Suche: </label>
            <input id="search" class="article" type="text" name="search" title=""/><!--pattern=".{6,}"-->
            <!--required="required"-->
        </p>
        <input type="submit" class="article" name="submit" value="Senden"/>
    </fieldset>
</form>

<table>
    <th>ID</th>
    <th>Artikel</th>
    <?php $articles = array();
    if (isset($_REQUEST['submit'])) {
        $search = $_REQUEST['search'];
        $db = DB::selectArticle($search);
        if ($db) {
            $articles = $db;
            $check = '<span>Eintrag gefunden</span>';
        } elseif (!$db) {
            $check = '<span>Error</span>';
        }
    } else if (!isset($_REQUEST['submit'])) {
        $articles = DB::selectArticle('%');
    }
    if (count($articles) == 0) {
        ?>
        <tr>
            <td rowspan="2">Keine Einträge gefunden</td>
        </tr>
    <?php }
    foreach ($articles as $article) { ?>
        <tr>
            <td><?php echo $article['id'] ?></td>
            <td><?php echo $article['name'] ?></td>
        </tr>
    <?php } ?>
</table>

<p class="check"><?= $checkins ?></p>
<form method="post" action="">
    <fieldset id="article-box">
        <legend id="article">Neuer Artikel</legend>
        <p>
            <label for="name">Name: </label>
            <input id="name" class="article" type="text" name="name" title=""/><!--pattern=".{6,}"-->
            <!--required="required"-->
        </p>
        <input type="submit" class="article" name="submitins" value="Senden"/>
    </fieldset>
</form>

<p class="check"><?= $checkdel ?></p>
<form method="post" action="">
    <fieldset id="article-box">
        <legend id="article">Lösche Artikel</legend>
        <p>
            <label for="aid">Löschen: </label>
            <input id="aid" class="article" type="text" name="aid" title=""/><!--pattern=".{6,}"-->
            <!--required="required"-->
        </p>
        <input type="submit" class="article" name="submitdel" value="Senden"/>
    </fieldset>
</form>

</body>
</html>
