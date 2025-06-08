<?php
require_once("bin/functions/session.php");

// Clear all session variables
$_SESSION = [];

// Destroy the session
session_destroy();

// Redirect to home page
header("Location: index.php");
exit;
