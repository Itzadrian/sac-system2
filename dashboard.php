<?php
require_once("bin/functions/session.php");
require_once("bin/functions/functions.php");
require_once("bin/functions/dbase.php");

confirm_logged_in();

$email = $_SESSION['email'] ?? '';

if (empty($email)) {
    redirect_to("login.php");
}

$query = "SELECT * FROM users WHERE email = '{$dbase->escape_value($email)}' LIMIT 1";
$result = $dbase->query($query);
$user = $dbase->fetch_array($result);

if (!$user) {
    $user = []; // fallback in case of missing user
}

function display($key, $default = 'N/A') {
    global $user;
    return htmlspecialchars($user[$key] ?? $default);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - SSNS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'partials/header.php'; ?>

    <main class="container mt-5">
        <div class="card p-4 shadow-sm">
            <h2 class="text-center mb-4">Welcome to the Student Security Number Portal</h2>

            <div class="row">
                <div class="col-md-6 mb-2"><strong>Full Name:</strong> <?= display('surname') ?> <?= display('middle_name') ?> <?= display('other_name') ?></div>
                <div class="col-md-6 mb-2"><strong>Email:</strong> <?= display('email') ?></div>
                <div class="col-md-6 mb-2"><strong>Gender:</strong> <?= display('gender') ?></div>
                <div class="col-md-6 mb-2"><strong>Date of Birth:</strong> <?= display('dob') ?></div>
                <div class="col-md-6 mb-2"><strong>State of Origin:</strong> <?= display('state') ?></div>
                <div class="col-md-6 mb-2"><strong>LGA of Origin:</strong> <?= display('lga') ?></div>
                <div class="col-md-6 mb-2"><strong>User Type:</strong> <?= ucfirst(display('user_type')) ?></div>
                <div class="col-md-6 mb-2"><strong><?= display('user_type') === 'staff' ? 'Staff ID' : 'Matric Number' ?>:</strong> <?= display('id_number') ?></div>
                <div class="col-md-6 mb-2"><strong>School:</strong> <?= display('school') ?></div>
                <div class="col-md-6 mb-2"><strong>Department:</strong> <?= display('department') ?></div>
                <div class="col-md-6 mb-2"><strong>Course Level:</strong> <?= display('course_level') ?></div>
                <div class="col-md-6 mb-2"><strong>Phone Number:</strong> <?= display('phone') ?></div>
                <div class="col-md-6 mb-2"><strong>Address:</strong> <?= display('address') ?></div>
                <div class="col-md-6 mb-2"><strong>Marital Status:</strong> <?= display('marital_status') ?></div>
                <div class="col-md-6 mb-2"><strong>Security Access Code (SAC):</strong> <span class="text-success fw-bold"><?= display('sac') ?></span></div>
            </div>

            <div class="text-center mt-4">
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </main>

    <?php include 'partials/footer.php'; ?>
    <script src="js/bootstrap.js"></script>
</body>
</html>


