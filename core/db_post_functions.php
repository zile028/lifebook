<?php

function getCategories()
{
    global $db;

    $sql = $db->prepare("SELECT * FROM categories");
    $sql->execute();

    if (0 == $sql->errno) {
        $result = $sql->get_result();
        $cat    = $result->fetch_all(MYSQLI_ASSOC);
        return $cat;

    } else {
        header("Location: errors.php");
    }

}

function savePost($title, $body, $target_name, $user_id, $category_id, $public)
{
    global $db;

    $sql = $db->prepare("INSERT INTO posts (title, body, image, user_id, category_id, public) VALUES(?,?,?,?,?,?)");
    $sql->bind_param("sssiii", $title, $body, $target_name, $user_id, $category_id, $public);
    $sql->execute();

    if (0 == $sql->errno) {
        return true;
    } else {
        return false;
    }
}

function getAllPostsFromUser($id)
{

    global $db;
    $sql = $db->prepare("SELECT * FROM posts WHERE user_id=? ORDER BY created_at DESC");
    $sql->bind_param('i', $id);
    $sql->execute();

    if (0 == $sql->errno) {
        $result = $sql->get_result();
        $posts  = $result->fetch_all(MYSQLI_ASSOC);

        return $posts;
    } else {
        return false;
    }

}

function deletePost($id)
{
    global $db;
    $sql = $db->prepare("DELETE FROM posts WHERE id=?");
    $sql->bind_param('i', $id);
    $sql->execute();

    if (0 == $sql->errno) {
        return true;
    } else {
        return false;
    }
}

function getSinglePost($post_id)
{
    global $db;
    $sql = $db->prepare("SELECT * FROM posts WHERE id=?");
    $sql->bind_param('i', $post_id);
    $sql->execute();

    if (0 == $sql->errno) {
        $result = $sql->get_result();
        $post   = $result->fetch_assoc();

        return $post;
    } else {
        return false;
    }
}

function editPost($title, $body, $category_id, $public, $user_id, $post_id)
{
    global $db;
    $sql = $db->prepare("UPDATE posts SET title=?, body=?,
                                category_id=?, public=?,
                                user_id=?, updated_at=NOW()
                                WHERE id=?");
    $sql->bind_param('ssiiii', $title, $body, $category_id, $public, $user_id, $post_id);
    $sql->execute();

    if (0 == $sql->errno) {
        return true;
    } else {
        return false;
    }
}

function getAllPublicPosts($criteria, $id)
{
    global $db;
    $public = 1;
    if (isset($id)) {
        $sql = $db->prepare("SELECT posts.*, posts.id AS post_id, users.id, users.first_name, users.last_name, categories.name AS category_name
                              FROM posts
                              INNER JOIN users ON posts.user_id = users.id
                              INNER JOIN categories ON posts.category_id = categories.id
                              WHERE (public =? AND $criteria=?)
                              ORDER BY created_at DESC;");
       
        $sql->bind_param("ii", $public,  $id);
    } else {
        $sql = $db->prepare("SELECT posts.*, posts.id AS post_id, users.id, users.first_name, users.last_name, categories.name AS category_name
                              FROM posts
                              INNER JOIN users ON posts.user_id = users.id
                              INNER JOIN categories ON posts.category_id = categories.id
                              WHERE public =?
                              ORDER BY created_at DESC;");
        $sql->bind_param("i", $public);
    }
    
    $sql->execute();

    if (0 == $sql->errno) {
        $result = $sql->get_result();
        $post   = $result->fetch_all(MYSQLI_ASSOC);
// dd($post);
        return $post;
    } else {
        return false;
    }
}