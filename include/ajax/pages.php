<?php
$pages[] = "front";
$pages[] = "login";
$pages[] = "create_user";
$pages[] = "preferences";
$pages[] = "playlist";

if (isset($_GET['page'])) {
    if (in_array($_GET['page'], $pages)) {
        $jsonArray['status'] = true;
        $jsonArray['pagename'] = $_GET['page'];
    } else {
        $jsonArray['status'] = false;
    }
} else {
    $jsonArray['status'] = false;
}
echo json_encode($jsonArray);
?>