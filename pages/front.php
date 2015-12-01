<?php
if($loginHandler->check_login()) {
    if($musicHandler->discover($loginHandler->user_session(), 2, null)) {
        $result = $musicHandler->song;
    } elseif ($musicHandler->_error->ErrorCode == "PLAYER_NO_NEW_SONGS") {
        if($musicHandler->play_from_list($loginHandler->user_session(), 2, null)) {
            $result = $musicHandler->song;
        } else {
            echo $musicHandler->_error->ErrorMessage;
        }
    } else {
        echo $musicHandler->_error->ErrorMessage;
    }
    $moods = $service->GetMoods(new GetMoods())->GetMoodsResult;
    $genres = $service->GetGenres(new GetGenres())->GetGenresResult;
    
    
    echo "<div style='margin-bottom:7px;'>Song name:<div id='songname'>" . $result->Name . "</div></div>";
    echo "<div style='margin-bottom:7px;'>File name:<div id='filename'>" . $result->Filename . "</div></div>";
    echo "<div style='margin-bottom:7px;'>Artist:<div id='artist'>" . $result->Artist->Name . "</div></div>";
    echo "<div>Album:<div id='album'>" . $result->Album->Name . "</div></div>";
    
    
    
    echo "
<<<<<<< HEAD
        <form name='discoverform' action='' method='post'>";
    foreach(getObjectsFromList($moods) as $value) {
        echo "<input type='radio' name='mood' value='".$value->Id."'";
        if(isset($_POST['mood']) && $_POST['mood'] == $value->Id) {
            echo "checked";
        }
        echo ">". $value->Name;
    }
    echo "<br/>";
    foreach(getObjectsFromList($genres) as $value) {
        echo "<input type='checkbox' name='genres[]' value='".$value->Id."'";
        if (isset($_POST['genres'])) {
            if($_POST['genres'] == $value->Id) {
                echo "checked";
            }
        }
        echo ">". $value->Name;
    }
    echo "<br /><input type='button' class='discover' name='discover' value='Discover'>
=======
        <form name='discoverform' action='' method='post'>
            <input type='hidden' class='artist_id' name='artist_id' value='". $result->Artist->Id ."'>
            <input type='button' class='discover' name='discover' value='Discover'>
            <input type='button' class='discover_by_artist' name='discover_by_artist' value='Discover More From Artist'>
>>>>>>> 6f456e3f7744e3780da4a08929ad7dded45bf861
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