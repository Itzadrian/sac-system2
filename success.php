<?php
require_once("bin/functions/session.php");
require_once("bin/functions/functions.php");

if (!isset($_SESSION['sac']) || !isset($_SESSION['fullname'])) {
    redirect_to("index.php");
}

$sac = 'FPN-' . $_SESSION['sac'];  // Format the SAC
$fullname = $_SESSION['fullname'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Registration Successful - SSNS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="stylesheet" href="css/style.css" />
</head>
<body>
  <?php include 'partials/header.php'; ?>

  <main>
    <section class="form-section text-center mt-5">
      <div class="container">
        <div class="verify-form">
          <h2>🎉 Registration Successful!</h2>
          <p class="lead">Hello <strong><?= htmlspecialchars($fullname) ?></strong>, your unique SAC is:</p>
          <div class="alert alert-success fw-bold fs-4">
            <?= htmlspecialchars($sac) ?>
          </div>
          <p>Please keep this code safe. You'll need it to access your secure records.</p>
          <a href="login.php" class="btn btn-primary mt-3 mb-3">Proceed to Login</a>
        </div>
      </div>
    </section>
  </main>

  <?php include 'partials/footer.php'; ?>

  <script src="js/script.js"></script>
  <script src="js/bootstrap.js"></script>
</body>
</html>
