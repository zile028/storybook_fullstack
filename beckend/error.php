<?php
require "core/init.php";

$err_msg = "";

switch ($_GET["err"]) {
    case ERR_REG:
        $err_msg = "You must be logged!";
        break;
}

require "views/error.php";