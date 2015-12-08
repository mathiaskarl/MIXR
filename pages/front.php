<?php
if(isset($_POST['url']) && $_POST['url'] == true) {
    require "../include/ajax_includes.php";
    require "../include/ajax/header_includes.php";
}

if($loginHandler->check_login()) {
    echo "front with login";
} else {
    echo "front without login";
}

    
?>