<?php

$title = "Login";
require "core/init.php";

if ("POST" == $_SERVER['REQUEST_METHOD']) {
 $errors = [];
 
 if (!isset($_POST['email']) || empty($_POST['email'])) {
  $email_error = "Email name is required";
  array_push($errors, $email_error);
 } else {
  $email = $_POST['email'];
 }

 if (!isset($_POST['password']) || empty($_POST['password'])) {
  $password_error = "Password name is required";
  array_push($errors, $password_error);
 } else {
  $password = $_POST['password'];
 }
 
 if(count($errors) == 0){
    if (loginUser($email,$password)) {
        header("Location: user/home.php?success=1");
    }else{
        $wrong_email_pass="Wrong email password combination";
    };
}
}

require "views/login.view.php";