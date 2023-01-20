<?php
require "../core/init.php";
if (!$User->isLogged()) {
    redirect(BASE_URL . "index.php");
}
$title = "All posts";
$user = $User->getUser($_SESSION["id"]);
$all_posts = $Post->userPosts($user->id);

require "views/all_posts.view.php";