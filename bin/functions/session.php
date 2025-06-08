<?php
require_once("functions.php"); // Adjust path if needed
// session_start();
// function is_logged_in() {
//     return isset($_SESSION['sac']);
// }
// function confirm_logged_in() {
//     if (!is_logged_in()) {
//         header("Location: ../../security_access_code_verification.php");
//         exit;
//     }
// }

require_once("functions.php"); // ✅ Add this to fix the error

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function confirm_logged_in() {
    if (!isset($_SESSION['sac'])) {
        redirect_to("login.php");
    }
}
?>

