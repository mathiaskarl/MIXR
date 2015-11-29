<?php
require "include/pages.php";
require "libs/service.php";
require "libs/config.php";
require "libs/functions.php";
require "handlers/LoginHandler.php";
require "handlers/UserHandler.php";
require "handlers/ErrorHandler.php";
require "handlers/MusicHandler.php";

session_start();
$config = new config();
$service = new Service();
$loginHandler = new LoginHandler($service);
$userHandler = new UserHandler($service);
$musicHandler = new MusicHandler($service);
?>