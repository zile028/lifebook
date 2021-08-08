<?php

$title = "Register";
require "core/init.php";

if ("POST" == $_SERVER['REQUEST_METHOD']) {
 $errors = [];
 if (!isset($_POST['first_name']) || empty($_POST['first_name'])) {
  $first_name_error = "First name is required";
  array_push($errors, $first_name_error);
 } else {
  $first_name = $_POST['first_name'];
 }

 if (!isset($_POST['last_name']) || empty($_POST['last_name'])) {
  $last_name_error = "Last name is required";
  array_push($errors, $last_name_error);
 } else {
  $last_name = $_POST['last_name'];
 }

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

 if (!isset($_POST['password_repeat']) || empty($_POST['password_repeat'])) {
  $password_repeat_error = "Password repeat name is required";
  array_push($errors, $password_repeat_error);
 } else {
  $password_repeat = $_POST['password_repeat'];
 }

 if ($_POST['password'] !== $_POST['password_repeat']) {
  $password_dont_match_error = "Repeat pass is not mathc";
  array_push($errors, $password_dont_match_error);
 }

 if (count($errors) == 0) {
  registerUser($_POST['title'], $first_name, $last_name, $email, $password);
 }
}

require "views/register.view.php";