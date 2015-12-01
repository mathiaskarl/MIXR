<?php
if($loginHandler->check_login()) {
    if($musicHandler->discover($loginHandler->user_session(), 1, null)) {
        $result = $musicHandler->song;
    } elseif ($musicHandler->_error->ErrorCode == "PLAYER_NO_NEW_SONGS") {
        if($musicHandler->play_from_list($loginHandler->user_session(), 1, null)) {
            $result = $musicHandler->song;
        } else {
            echo $musicHandler->_error->ErrorMessage;
        }
    } else {
        echo $musicHandler->_error->ErrorMessage;
    }
    
    echo "<div style='margin-bottom:7px;'>Song name:<div id='songname'>" . $result->Name . "</div></div>";
    echo "<div style='margin-bottom:7px;'>File name:<div id='filename'>" . $result->Filename . "</div></div>";
    echo "<div style='margin-bottom:7px;'>Artist:<div id='artist'>" . $result->Artist->Name . "</div></div>";
    echo "<div>Album:<div id='album'>" . $result->Album->Name . "</div></div>";

    echo "
        <form name='discoverform' action='' method='post'>
            <input type='button' class='discover' name='discover' value='Discover'>
        </form>
        
        <form name='discoverform' action='' method='post'>
            <input type='button' class='playfromlist' name='playfromlist' value='Play from list'>
        </form>
        
        <form name='addremoveform' action='' method='post'>
            <input type='hidden' class='song_id' name='song_id' value='". $result->Id ."'>
            <input type='button' class='addtolist' name='addtolist' value='Add to playlist'>
            <input type='button' class='removefromlist' name='removefromlist' value='Remove from playlist'>
        </form>
        <audio id='player' controls>
            <source id='music' src='music/". $result->Filename ."' type='audio/mpeg'>
        </audio>";
} else {
    "front without login";
}

    
?>