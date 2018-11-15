<?php

$id = $_POST['id'];
wpb_set_post_downloads($id);
echo wpb_get_post_downloads($id);

?>