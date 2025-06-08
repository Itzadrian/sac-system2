<?php
require_once("bin/functions/session.php");
confirm_logged_in();

$fullname = $_SESSION['fullname'] ?? 'Unknown User';
$email = $_SESSION['email'] ?? 'No email available';
$sac = $_SESSION['sac'] ?? 'N/A';
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

            <div class="mb-3">
                <strong>Full Name:</strong> <?= htmlspecialchars($fullname) ?>
            </div>
            <div class="mb-3">
                <strong>Email Address:</strong> <?= htmlspecialchars($email) ?>
            </div>
            <div class="mb-3">
                <strong>Your Security Access Code (SAC):</strong> 
                <span class="text-success fw-bold"><?= htmlspecialchars($sac) ?></span>
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

