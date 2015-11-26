<?php
    echo 
    "<div id='menu'>
        <ul id='nav'>
                <li><a href='?page=front'>Front</a></li>";
    if($loginHandler->check_login()) {
        echo "<li><a href='?page=preferences&step=password'>Change Password</a></li>";
        echo "<li><a href='?page=login&do=logout'>Log out</a></li>";
    } else {
        echo "<li><a href='?page=create_user'>Create user</a></li>
              <li><a href='?page=login'>Log in</a></li>";
    }
    echo "</ul>
    </div>";
?>
