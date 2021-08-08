<?php 
$title = "LifeBook";
require "core/init.php";
$users=getAllUser();
$categories=getCategories();
$id=null;
$criteria=null;

if(isset($_GET['category'])){
    $id = $_GET['category'];
    $criteria="category_id";
}elseif(isset($_GET['user'])){
    $id=$_GET['user'];
    $criteria="user_id";
}

$posts = getAllPublicPosts($criteria,$id);

// class Human {
//     public $lastName = "Zivkovic";
//     function __construct($name)
//     {
//         $this ->name = $name;
//     } 
//     function info(){
//         return $this->$name;
//     }
// }

// $person = new Human('danilo');
// echo $person;

// // echo $person -> $lastName;



require "views/index.view.php";