<?php
$root = $_SERVER['DOCUMENT_ROOT']."/MIXR/";
require $root."libs/service.php";
require $root."libs/functions.php";
require $root."handlers/LoginHandler.php";
require $root."handlers/ErrorHandler.php";
require $root."handlers/MusicHandler.php";

session_start();
$service = new Service();
$loginHandler = new LoginHandler($service);
$musicHandler = new MusicHandler($service);
?>

