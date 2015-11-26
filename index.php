<?php
require "include/pages.php";
require "libs/service.php";
require "libs/config.php";
require "libs/functions.php";
require "handlers/LoginHandler.php";
require "handlers/UserHandler.php";
require "handlers/ErrorHandler.php";

session_start();
$config = new config();
$service = new Service();
$loginHandler = new LoginHandler($service);
$userHandler = new UserHandler($service);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>MIXR</title>
        <link rel="shortcut icon" href="images/icon.png">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" charset="UTF-8">
        <meta name="description" content="TBA">
        <meta name="keywords" content="MIXR, musik, humør">
        <script src="js/jquery.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <div id="main_container">
            <div id="menu_container">
                <?php include "templates/menu.php"; ?>
            </div>

            <div id="content_container">
                <?php
                if (isset($_GET['page'])) {
                    if (in_array($_GET['page'], $pages)) {
                        include('pages/' . $_GET['page'] . '.php');
                    } else {
                        include('pages/front.php');
                    }
                } else {
                    include('pages/front.php');
                }
                ?>
            </div>

            <div id="footer_container">
                <?php include "templates/footer.php"; ?>
            </div>
        </div>
    </body>
</html>