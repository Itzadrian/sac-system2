<?php
require_once("bin/functions/session.php");
require_once("bin/functions/functions.php");
require_once("bin/functions/dbase.php");
require_once("bin/functions/new_law.php");
require_once("constants.php");
require_once("bin/functions/activity_logger.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $msg = empty_field($_POST);
    if (strlen($msg) != 0) {
        $_SESSION['msg'] = $msg;
        redirect_to(NULL_SAC);
    } else {
        foreach ($_POST as $key => $value) {
            $value = $dbase->escape_value(trim($value));
            $arr[$key] = $value;
        }
        $verifier = $arr['sac'];
        $authenticate = $officer->verify_sac($verifier);
        if ($authenticate) {
            $_SESSION['sac'] = $verifier;
            log_activity("Successful SAC verification for: {$verifier}");
            redirect_to(LAW_ENFORCEMENT_AGENTS_PORTAL);
        } else {
            $msg = "<p class='message-red'>YOUR SECURITY ACCESS CODE IS INVALID!</p>";
            log_activity("FAILED SAC verification attempt for: {$verifier}");
            $_SESSION['msg'] = $msg;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Security Access Code Verification</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
<div class="body1">
    <div class="main">
        <header>
            <div class="wrapper">
                <!-- <h1>NIGERIA</h1> -->
                <div class="nssn2">FEDERAL REPUBLIC OF NIGERIA</div>
                    <div id="slogan6">
                        <p id="dateDisplay"></p>
                        <?php
                        if (isset($_SESSION['msg'])) {
                            echo $_SESSION['msg'];
                            unset($_SESSION['msg']);
                            echo "<div id='slogan8'><a href='security_access_code_verification.php'>Check Back</a></div>";
                        }
                        ?>
                        <form action="security_access_code_verification.php" method="post">
                            <input type="text" name="sac" placeholder="Enter Security Access Code" required>
                            <input type="submit" value="Verify">
                        </form>
                    </div>
                </div>
                <div id="col-3-dmr3">Disclaimer: Property of the Federal Government of Nigeria. Unauthorized access is prohibited.</div>
                <div>System</div>
            </div>
        </header>
    </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function () {
    var mydate = new Date();
    var year = mydate.getFullYear();
    var day = mydate.getDay();
    var month = mydate.getMonth();
    var daym = mydate.getDate();
    if (daym < 10) daym = "0" + daym;
    var dayarray = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
    var montharray = ["January", "February", "March", "April", "May", "June",
                      "July", "August", "September", "October", "November", "December"];
    document.getElementById("dateDisplay").textContent =
        dayarray[day] + ", " + montharray[month] + " " + daym + ", " + year;
});
</script>
</body>
</html>
