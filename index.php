<?php
require "core/init.php";
$title = "StoryBook";
if ($User->isLogged()) {
//    redirect(BASE_URL . "index.php");
    $user = $User->getUser($_SESSION["id"]);
}

$categories = $Post->getCategory();
$all_posts = [];
if (isset($_GET["category"])) {
    $all_posts = $Post->getPublicPostByCategory($_GET["category"]);
} else if (isset($_GET["user"])) {
    $all_posts = $Post->getPublicUserPost($_GET["user"]);

} else {
    $all_posts = $Post->getPublic();
}
require "views/index.view.php";