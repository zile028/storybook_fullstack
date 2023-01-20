<?php
$title = "Register";
require "core/init.php";


$error = [];
$data = [];
$data["title"] = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data["title"] = $_POST["title"];
    if (isset($_POST["first_name"]) && !empty($_POST["first_name"])) {
        $data["first_name"] = $_POST["first_name"];
    } else {
        $error["first_name"] = "First name is required!";
    }

    if (isset($_POST["last_name"]) && !empty($_POST["last_name"])) {
        $data["last_name"] = $_POST["last_name"];
    } else {
        $error["last_name"] = "Last name is required!";
    }

    if (isset($_POST["email"]) && !empty($_POST["email"])) {
        $data["email"] = $_POST["email"];
    } else {
        $error["email"] = "Email is required!";
    }

    if (isset($_POST["password"]) && !empty($_POST["password"])) {
        $data["password"] = $_POST["password"];
    } else {
        $error["password"] = "Password is required!";
    }

    if (isset($_POST["password_repeat"]) && !empty($_POST["password_repeat"])) {
        if ($_POST["password"] !== $_POST["password_repeat"]) {
            $error["password_repeat"] = "Repeat password is not match with password!";
        }
    } else {
        $error["password_repeat"] = "Repeat password is required!";
    }
    if (count($error) === 0) {
        if ($User->register($data)) {
            redirect("login.php");
        } else {
            dd($User->err_msg);
        };

    }
}
require "views/register.view.php";
