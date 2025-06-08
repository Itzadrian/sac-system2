<?php
function redirect_to($location = NULL) {
    if ($location != NULL) {
        header("Location: {$location}");
        exit;
    }
}
function empty_field($post) {
    foreach ($post as $key => $value) {
        if (trim($value) == "") {
            return "<p class='message-red'>Please fill in all fields.</p>";
        }
    }
    return "";
}
