<!-- <?php
require_once("bin/functions/session.php");
require_once("bin/functions/functions.php");

// Check if user just registered
if (!isset($_SESSION['registered_username']) || !isset($_SESSION['registered_sac'])) {
    // If no data, redirect to home
    redirect_to("index.php");
    exit;
}

$username = $_SESSION['registered_username'];
$sac = $_SESSION['registered_sac'];

// Clear the session vars so they don’t persist
unset($_SESSION['registered_username']);
unset($_SESSION['registered_sac']);
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="UTF-8" />
    <title>Welcome, <?php echo htmlspecialchars($username); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-body-secondary">
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <div class="card shadow p-4">
                <h2>Welcome, <?php echo htmlspecialchars($username); ?>!</h2>
                <p class="lead mt-3">Your Security Access Code (SAC) is:</p>
                <h3 class="text-primary"><?php echo htmlspecialchars($sac); ?></h3>
                <p class="mt-4">
                    Please keep this code safe. You will need it to access secure areas.
                </p>
                <a href="index.php" class="btn btn-outline-primary mt-3">Go to Home</a>
                <a href="login.php" class="btn btn-primary mt-3 ms-2">Login Now</a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> -->
