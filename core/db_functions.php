<?php

function registerUser($title, $first_name, $last_name, $email, $password)
{
 global $db;
 $role          = 'user';
 $password_hash = password_hash($password, PASSWORD_DEFAULT);
 $sql           = $db->prepare("INSERT INTO users (title,first_name,
                            last_name, email, password, role)
                            VALUES (?,?,?,?,?,?)");
 $sql->bind_param("ssssss", $title, $first_name, $last_name, $email, $password_hash, $role);
 $sql->execute();
 if (0 == $sql->errno) {
  $_SESSION['id'] = $sql->insert_id;
  header("Location: user/home.php");
 } else {
  header("Location: error.php");
 }
}

function isLogged()
{
 if (isset($_SESSION['id'])) {
  return true;
 } else {
  return false;
 }
}

function loginUser($email, $password)
{
 global $db;
 $user_password = getUserPassword($email);

 if (!$user_password) {
  return false;
 }

 if (!password_verify($password, $user_password)) {
  return false;
 }

 $sql = $db->prepare("SELECT id FROM users WHERE email=? AND password=?");
 $sql->bind_param("ss", $email, $user_password);
 $sql->execute();

 if (0 == $sql->errno) {
  $result         = $sql->get_result();
  $id             = $result->fetch_assoc()['id'];
  $_SESSION['id'] = $id;
  return true;
 } else {
  header("Location: error.php");
 }

}

function getUserPassword($email)
{
 global $db;
 $sql = $db->prepare("SELECT password FROM users WHERE email=?");
 $sql->bind_param("s", $email);
 $sql->execute();

 $result = $sql->get_result(); // mysql result set
 if (0 == $result->num_rows) {
  return false;
 }
 $password = $result->fetch_assoc()['password'];

 return $password;

}

function getUser($id)
{
 global $db;
 $sql = $db->prepare("SELECT * FROM users WHERE id=?");
 $sql->bind_param("i", $id);
 $sql->execute();

 $result = $sql->get_result(); // mysql result set

 $user = $result->fetch_assoc();

 return $user;

}

function getAllUser()
{
 global $db;
 $sql = $db->prepare("SELECT * FROM users");
 $sql->execute();

 $result = $sql->get_result(); // mysql result set

 $users = $result->fetch_all(MYSQLI_ASSOC);

 return $users;

}



function changeTitle($user)
{
 global $db;
 $title = "";
 if ("mr" == $user['title']) {
  $title = "ms";
 } else {
  $title = "mr";
 }
 $sql = $db->prepare("UPDATE users SET title=?, updated_at=now() WHERE id=?");
 $sql->bind_param("si", $title, $user['id']);
 $sql->execute();
 
 if ($sql->errno == 0) {
  return true;
 } else {
  return false;
 }
}


function changeEmail($email,$id)
{
    global $db;
    $sql = $db->prepare("UPDATE users SET email=?, updated_at=NOW() WHERE id=?");
    $sql->bind_param("si",$email,$id);
    $sql->execute();

    if($sql->errno == 0){
        return true;
    }else{
        return false;
    }
}

function changePassword($password,$new_password, $user)
{
    global $db;
    $sql = $db->prepare("UPDATE users SET email=?, updated_at=NOW() WHERE id=?");
    $sql->bind_param("si",$email,$id);
    $sql->execute();

    if($sql->errno == 0){
        return true;
    }else{
        return false;
    }
}