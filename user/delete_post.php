<?php
require "../core/init.php";

if (!$User->isLogged()) {
    redirect(BASE_URL . "index.php");
}
$user = $User->getUser($_SESSION["id"]);
if ($user->role !== USER) {
    redirect(BASE_URL . "index.php");
}
if (isset($_GET["id"])) {
    $post = $Post->getPost($_GET["id"]);
    if ($post->image) {
        unlink(UPLOAD_PATH . $post->image);
    }
    if ($Post->deletePost($post->id)) {
        redirect(BASE_URL . "user/all_posts.php");
    } else {
        redirect(BASE_URL . "error.php");
    };
} else {
    redirect(BASE_URL . "user/all_posts.php");
}