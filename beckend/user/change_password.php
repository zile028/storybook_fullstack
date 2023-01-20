<?php

require "../core/init.php";

if (!$User->isLogged()) {
    redirect(BASE_URL . "index.php");
}
$title = "Change name";
$user = $User->getUser($_SESSION["id"]);

if ($user->role !== USER) {
    redirect(BASE_URL . "index.php");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $error = [];
    $data["email"] = $user->email;

    if (isset($_POST["old_password"]) && !empty($_POST["old_password"])) {
        $data["old_password"] = $_POST["old_password"];
    } else {
        $error["msg"] = "All field is required!";
    }

    if (isset($_POST["password"]) && !empty($_POST["password"])) {
        $data["password"] = $_POST["password"];
    } else {
        $error["msg"] = "All field is required!";
    }

    if (isset($_POST["password_repeat"]) && !empty($_POST["password_repeat"])) {
        if ($_POST["password"] !== $_POST["password_repeat"]) {
            $error["msg"] = "Repeat password is not match with password!";
        }
    } else {
        $error["msg"] = "All field is required!";
    }

    if (count($error) === 0) {
        if ($User->changePassword($data)) {
            redirect(BASE_URL . "user/account.php");
        } else {
            $error["msg"] = $User->err_msg;
        };
    }
}


require "views/change_password.view.php";