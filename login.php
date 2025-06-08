<?php
require_once("bin/functions/session.php");
require_once("bin/functions/functions.php");
require_once("bin/functions/dbase.php");

$msg = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sac = strtoupper(trim($_POST['sac']));

    if (empty($sac)) {
        $msg = "<div class='alert alert-danger'>Please enter your SAC.</div>";
    } else {
        $sac = $dbase->escape_value($sac);

        // Fetch user by SAC
        $result = $dbase->query("SELECT * FROM users WHERE sac = '{$sac}' LIMIT 1");

        if ($dbase->num_rows($result) > 0) {
            $user = $dbase->fetch_array($result);

            // Store user info in session
            $_SESSION['sac'] = $user['sac'];
            $_SESSION['fullname'] = $user['fullname'];
            $_SESSION['email'] = $user['email'];

            redirect_to("dashboard.php");
        } else {
            $msg = "<div class='alert alert-danger'>Invalid SAC. Please try again.</div>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SSNS Login</title>
  <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="stylesheet" href="css/style.css" />
</head>
<body>
  <?php include 'partials/header.php'; ?>

  <main class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6 p-5">
        <?= $msg ?>
        <form method="post" action="login.php" class="card p-4 shadow-sm">
          <h3 class="text-center mb-4">Student Login</h3>
          <div class="mb-3">
            <label for="sac" class="form-label">Security Access Code (SAC)</label>
            <input type="text" class="form-control" id="sac" name="sac" placeholder="Enter your SAC (e.g. 12345678901)" required />
          </div>
          <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
      </div>
    </div>
  </main>

  <?php include 'partials/footer.php'; ?>
  <script src="js/bootstrap.js"></script>
</body>
</html>

