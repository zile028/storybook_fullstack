<?php
require "../core/init.php";
$all_post = $Post->getPublic();
echo json_encode($all_post);