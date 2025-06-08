<?php
require_once("bin/functions/session.php");
$_SESSION = [];
session_destroy();
header("Location: index.php");
exit;
