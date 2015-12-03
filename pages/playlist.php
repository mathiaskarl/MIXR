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
    header('Location: http://localhost:8080/MIXR/');
    die();
}
echo "<div id='playlist_container'></div>";
?>