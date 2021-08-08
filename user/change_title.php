<?php 

require "../core/init.php";

if(!isLogged()){
    header("Location: /lifebook/index.php");
}

$user = getUser($_SESSION['id']);

if(changeTitle($user)){
    header("Location: account.php");
}else{
    header('Location: /lifebook/error.php');
}

require "./views/home.view.php";