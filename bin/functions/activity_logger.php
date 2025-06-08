<?php
function log_activity($message) {
    $logfile = __DIR__ . "/../../logs/user_activity.log";
    $time = strftime("%Y-%m-%d %H:%M:%S", time());
    $content = "[{$time}] {$message}\n";
    file_put_contents($logfile, $content, FILE_APPEND);
}
