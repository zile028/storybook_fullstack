<?php
require "core/init.php";
if (!$User->isLogged()) {
    redirect("error.php?err=" . ERR_REG);
}

if (isset($_GET["id"])) {
    $post_id = $_GET["id"];
    $user_id = $_SESSION["id"];
    $Post->voting($post_id, $user_id);
    redirect("index.php");
}