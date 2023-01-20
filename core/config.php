<?php
const config = [
    "host" => "localhost",
    "user" => "root",
    "password" => "",
    "database" => "storybook"
];
define("BASE_URL", "/storybook/");
const ADMIN = "admin";
const USER = "user";
const KB = 1024;
const MB = 1048576;
const UPLOAD_DIR = "public/";
define("UPLOAD_PATH", dirname(__DIR__) . "config.php/" . UPLOAD_DIR);
const ERR_REG = 1;