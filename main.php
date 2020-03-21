<?php

if(isset($_REQUEST['submit'])){
    if($_REQUEST['password']=='admin'&&$_REQUEST['username']=='admin'){

    } else {
        header('location: login.php');
    }
} else {
    header('location: login.php');
}