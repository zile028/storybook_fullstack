<?php
require "../core/init.php";

if (!$User->isLogged()) {
    redirect(BASE_URL . "login.php");
}
$title = "Add post";
$user = $User->getUser($_SESSION["id"]);
$categories = $Post->getCategory();
$visibilities = $Post->getVisibility();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $error = [];
    $data = [];

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

    // VALIDATE IMAGE
    //check size, file size in byte
    //check file type
    //generate file name
    //check upload folder exist

    $image = $_FILES["image"];

    if (!empty($image["name"])) {

        $allow_size = 3 * MB;
        $allow_type = ["jpg", "png", "gif", "jpeg"];
        $upload = new Upload($image, $allow_size, $allow_type);

//        $file_error = [];
//        $image_name = $image["name"];
//        $image_size = $image["size"];
//        $image_type = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
//        if ($image_size > $allow_size) {
//            $file_error["size"] = "Image file is to big, allowed size is 3MB";
//        }
//        if (!in_array($image_type, $allow_type)) {
//            $file_error["type"] = "Image type is not allowed, allowed type is " . implode(",", $allow_type);
//        }
//        $stored_name = time() . "." . $image_type;

        if ($upload->validate()) {
            if (!file_exists(UPLOAD_PATH)) {
                mkdir(UPLOAD_PATH);
            }
            $upload->uploadFile();
            $data["image"] = $upload->stored_name;
        }
    } else {
        $data["image"] = null;
    }

    if (count($error) === 0) {
        $Post->addPost($data) ? redirect(BASE_URL . "user/all_posts.php") : $error["msg"] = "Something wrong with server!";
    }


}

require "views/add_post.view.php";