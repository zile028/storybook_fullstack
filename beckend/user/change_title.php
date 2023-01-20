<?php
require "../core/init.php";

if (!$User->isLogged()) {
    redirect(BASE_URL . "index.php");
}

$User->changeTitle($_SESSION["id"]);

if ($user->role !== USER) {
    redirect(BASE_URL . "index.php");
}

redirect(BASE_URL . "user/account.php");