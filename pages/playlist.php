<script type='text/javascript'>
    $(function () {
        $("#playlisttable").tablesorter({sortList: [[0, 0], [0, 0], [0, 0]]});
    });
    $(document).ready(function(){
        set_playlist();
    });
</script>
<?php
if(isset($_POST['url']) && $_POST['url'] == true) {
    require "../include/ajax_includes.php";
    require "../include/ajax/header_includes.php";
}

if (!$loginHandler->check_login()) {
    ErrorHandler::ErrorPage("USER_MUST_BE_LOGGED_IN");
} else {
    echo "<div id='playlist_container'></div>";
}
?>