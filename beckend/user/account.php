<?php
require "../core/init.php";
$title = "User account";

if (!$User->isLogged()) {
    redirect(BASE_URL . "index.php");
}

$user = $User->getUser($_SESSION["id"]);
if ($user->role !== USER) {
    redirect(BASE_URL . "index.php");
}


require "views/account.view.php";