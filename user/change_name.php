<?php

require "../core/init.php";

if (!$User->isLogged()) {
    redirect(BASE_URL . "index.php");
}
$title = "Change name";
$user = $User->getUser($_SESSION["id"]);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $error = [];
    $data["id"] = $_SESSION["id"];
    if (isset($_POST["first_name"]) && !empty($_POST["first_name"])) {
        $data["first_name"] = $_POST["first_name"];
    } else {
        $error["first_name"] = "First name is required";
    }

    if (isset($_POST["last_name"]) && !empty($_POST["last_name"])) {
        $data["last_name"] = $_POST["last_name"];
    } else {
        $error["last_name"] = "Last name is required";
    }

    if (count($error) === 0) {
        if ($User->changeName($data)) {
            redirect(BASE_URL . "user/account.php");
        } else {
            $error["db"] = "Name has not changed!";
        };
    }
} else {
    $data["first_name"] = $user->first_name;
    $data["last_name"] = $user->last_name;
}


require "views/change_name.view.php";