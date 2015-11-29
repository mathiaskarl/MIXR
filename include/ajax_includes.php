<?php
require "../../libs/service.php";
require "../../handlers/LoginHandler.php";
require "../../handlers/ErrorHandler.php";
require "../../handlers/MusicHandler.php";

session_start();
$service = new Service();
$loginHandler = new LoginHandler($service);
$musicHandler = new MusicHandler($service);
?>

