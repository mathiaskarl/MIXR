<?php
if(isset($_POST['url']) && $_POST['url'] == true) {
    require "../include/ajax_includes.php";
    require "../include/ajax/header_includes.php";
}

if($loginHandler->check_login()) {
    $moods = $service->GetMoods(new GetMoods())->GetMoodsResult;
    $genres = $service->GetGenres(new GetGenres())->GetGenresResult;
    
    echo "<div style='margin-bottom:7px;'>Song name:<div id='songname'></div></div>";
    echo "<div style='margin-bottom:7px;'>File name:<div id='filename'></div></div>";
    echo "<div style='margin-bottom:7px;'>Artist:<div id='artist'></div></div>";
    echo "<div>Album:<div id='album'></div></div>";
    
    echo " <form name='discoverform' action='' method='post'>";
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
    echo "<br />
        <form name='discoverform' action='' method='post'>
            <input type='hidden' class='artist_id' name='artist_id'>
            <input type='button' class='discover' name='discover' value='Discover'>
            <input type='button' class='discover_by_artist' name='discover_by_artist' value='Discover More From Artist'>
            <input type='button' class='playfromlist' name='playfromlist' value='Play from list'>
        </form>
        
        <form name='addremoveform' action='' method='post'>
            <input type='hidden' class='song_id' name='song_id'>
            <input type='button' class='addtolist' name='addtolist' value='Add to playlist'>
            <input type='button' class='removefromlist' name='removefromlist' value='Remove from playlist'>
        </form>";
} else {
    "front without login";
}

    
?>