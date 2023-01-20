<?php
require "../core/init.php";
$title = "Edit post";
if (!$User->isLogged()) {
    redirect(BASE_URL . "index.php");
}
$user = $User->getUser($_SESSION["id"]);


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $error = [];
    $data = [];
    $data["id"] = $_POST["id"];
    if (isset($_POST["remove_image"])) {
        $Post->removeImage($data["id"]);
        if (isset($_POST["old_image"]) && !empty($_POST["old_image"])) {
            unlink(UPLOAD_PATH . $_POST["old_image"]);
        }
        redirect(BASE_URL . "user/edit_post.php?id=" . $data["id"]);
        return;
    }

    $data["visibility_id"] = $_POST["visibility_id"];
    $data["category_id"] = $_POST["category_id"];
    $data["user_id"] = $user->id;

    if (isset($_POST["title"]) && !empty($_POST["title"])) {
        $data["title"] = $_POST["title"];
    } else {
        $error["title"] = "Post title is required!";
    }

    if (isset($_POST["text"]) && !empty($_POST["text"])) {
        $data["text"] = $_POST["text"];
    } else {
        $error["text"] = "Post text is required!";
    }


    $image = $_FILES["image"];

    if (!empty($image["name"])) {
        $allow_size = 3 * MB;
        $allow_type = ["jpg", "png", "gif", "jpeg"];

        $upload = new Upload($image, $allow_size, $allow_type);
        if ($upload->validate()) {
            if (!file_exists(UPLOAD_PATH)) {
                mkdir(UPLOAD_PATH);
            }
            $upload->uploadFile();
            $data["image"] = $upload->stored_name;
        }
        if (isset($_POST["old_image"]) && !empty($_POST["old_image"])) {
            unlink(UPLOAD_PATH . $_POST["old_image"]);
        }

    } else {
        $data["image"] = $_POST["old_image"];
    }


    if (count($error) === 0) {
        $Post->updatePost($data) ? redirect(BASE_URL . "user/all_posts.php") : $error["msg"] = "Something wrong with server!";
    }


} else {
    if (isset($_GET["id"])) {
        $post = $Post->getPost($_GET["id"]);
        if ($post->user_id === $user->id) {
            $categories = $Post->getCategory();
            $visibilities = $Post->getVisibility();
        } else {
            redirect(BASE_URL . "index.php");
        }
    } else {
        redirect(BASE_URL . "index.php");
    }
}

require "views/edit_post.view.php";