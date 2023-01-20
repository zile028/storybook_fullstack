<?php
require "../core/init.php";

if (!$User->isLogged()) {
    redirect(BASE_URL . "index.php");
}
$user = $User->getUser($_SESSION["id"]);
$title = "Single post";
if ($user->role !== USER) {
    redirect(BASE_URL . "index.php");
}
if (isset($_GET["id"])) {
    $post = $Post->getPost($_GET["id"]);

} else {
    redirect(BASE_URL . "user/all_posts.php");
}

require "views/single_post.view.php";