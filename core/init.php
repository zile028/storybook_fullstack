<?php
header("Access-Control-Allow-Origin: *");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require "helpers.php";
require "config.php";
require "Connection.php";
require "QueryBuilder.php";
require "User.php";
require "Post.php";
require "Upload.php";

