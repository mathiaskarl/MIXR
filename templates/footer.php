<?php
if ($loginHandler->check_login()) {
    echo "<audio id='player' controls><source id='music' type='audio/mpeg'></audio>";
} else {
    echo "Footer";
}


?>