<?php 
$title = "LifeBook";
require "core/init.php";
$users=getAllUser();
$categories=getCategories();


if(isset($_GET['postid'])){
    
    $post=getAllPublicPosts("posts.id",$_GET['postid'])[0];
}

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



require "views/single_post.view.php";