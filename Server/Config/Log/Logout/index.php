<?php 
// require "../../../../Client/index.php";
session_start();
session_unset();
session_destroy();

$_SESSION = [];

header("Location: ../../../../Client/index.php");


?>