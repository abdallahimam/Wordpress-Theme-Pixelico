<?php

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $id = (int)$id;
    wpb_set_post_likes($id);
    return wpb_get_post_likes($id);
} else {
    echo "Error";

}

?>