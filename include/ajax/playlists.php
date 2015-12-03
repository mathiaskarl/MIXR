<?php
require "../../include/ajax_includes.php";
require "../../include/ajax/header_includes.php";

if(isset($_REQUEST['artist_id']) && $_REQUEST['artist_id'] > 0) {
    if (!$musicHandler->get_artist_songs($_REQUEST['artist_id'])) {
        echo $musicHandler->_error->ErrorMessage;
    } else {
        $result = $musicHandler->artist_songs;
   
        echo "<form name='playlistform' action='' method='post'>"
                . "<input type='button' class='back_to_user_playlist' value='Back'>"
                . "<table id='playlisttable' class='tablesorter'>
                    <thead><tr>
                    <th >Song:</th>
                    <th class='header'>Artist:</th>
                    <th class='header'>Album</th>
                    </tr></thead>
                    <tbody>";
            if(isset($result->Song) && is_array($result->Song)) {
                foreach(getObjectsFromList($result) as $value) {
                    echo "<tr songid='".$value->Id."'>";
                    echo "<td>".$value->Name."</td>"
                        . "<td>".$value->Artist->Name."</td>"
                        . "<td>".$value->Album->Name."</td>"
                        . "<td><input type='button' class='addtolist' name='addtolist' songid='".$value->Id."' value='Add to list'></td>"
                        . "<td><input type='button' class='play_by_id' name='play_by_id' songid='".$value->Id."' value='Play'></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr songid='".$result->Song->Id."'>";
                    echo "<td>".$result->Song->Name."</td>"
                        . "<td>".$result->Song->Artist->Name."</td>"
                        . "<td>".$result->Song->Album->Name."</td>"
                        . "<td><input type='button' class='addtolist' name='addtolist' songid='".$result->Song->Id."' value='Add to list'></td>"
                        . "<td><input type='button' class='play_by_id' name='play_by_id' songid='".$result->Song->Id."' value='Play'></td>";
                    echo "</tr>";
            }
            echo "</tbody></table></form>";
    }
} else {
    if (!$musicHandler->get_playlist($loginHandler->user_session())) {
        echo $musicHandler->_error->ErrorMessage;
        
    } else {
        $result = $musicHandler->playlist;

        echo "<form name='playlistform' action='' method='post'>"
                . "<table id='playlisttable' class='tablesorter'>
                    <thead><tr>
                    <th >Song:</th>
                    <th class='header'>Artist:</th>
                    <th class='header'>Album</th>
                    </tr></thead>
                    <tbody>";
            if(isset($result->Song) && is_array($result->Song)) {
                foreach(getObjectsFromList($result) as $value) {
                    echo "<tr songid='".$value->Id."'>";
                    echo "<td>".$value->Name."</td>"
                        . "<td>".$value->Artist->Name."</td>"
                        . "<td>".$value->Album->Name."</td>"
                        . "<td><input type='button' class='removefromlist' name='removefromlist' songid='".$value->Id."' value='Remove from list'></td>"
                        . "<td><input type='button' class='play_by_id' name='play_by_id' songid='".$value->Id."' value='Play'></td>"
                        . "<td><input type='button' class='get_artist_songs' name='get_artist_songs' songid='".$value->Id."' artistid='".$value->ArtistId."' value='Discover artist'></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr songid='".$result->Song->Id."'>";
                    echo "<td>".$result->Song->Name."</td>"
                        . "<td>".$result->Song->Artist->Name."</td>"
                        . "<td>".$result->Song->Album->Name."</td>"
                        . "<td><input type='button' class='removefromlist' name='removefromlist' songid='".$result->Song->Id."' value='Remove from list'></td>"
                        . "<td><input type='button' class='play_by_id' name='play_by_id' songid='".$result->Song->Id."' value='Play'></td>"
                        . "<td><input type='button' class='get_artist_songs' name='get_artist_songs' songid='".$result->Song->Id."' artistid='".$result->Song->ArtistId."' value='Discover artist'></td>";
                    echo "</tr>";
            }
            echo "</tbody></table></form>";
    }
}
?>