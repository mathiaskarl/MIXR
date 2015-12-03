<?php
    echo 
    "<div id='menu'>
        <ul id='nav'>
                <li><a class='change_page' page='front' href='#'>Front</a></li>";
    if($loginHandler->check_login()) {
        echo "<li><a class='change_page' page='playlist' href='#'>Playlist</a></li>";
        echo "<li><a class='change_page' page='preferences' subpage='preferences' href='#'>Change Preferences</a></li>";
        echo "<li><a class='change_page' page='preferences' subpage='password' href='#'>Change Password</a></li>";
        echo "<li><a href='?page=login&do=logout'>Log out</a></li>";
    } else {
        echo "<li><a href='?page=create_user'>Create user</a></li>
              <li><a href='?page=login'>Log in</a></li>";
    }
    echo "</ul>
    </div>";
?>
