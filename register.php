<?php
require_once("bin/functions/session.php");
require_once("bin/functions/functions.php");
require_once("bin/functions/dbase.php");

$msg = "";

// Generate a random 11-digit SAC number
function generate_sac() {
    return strval(mt_rand(10000000000, 99999999999));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);

    if (empty($fullname) || empty($email)) {
        $msg = "<div class='alert alert-danger'>All fields are required.</div>";
    } else {
        $fullname = $dbase->escape_value($fullname);
        $email = $dbase->escape_value($email);

        // Check if user with same fullname and email already exists
        $check_duplicate = $dbase->query("SELECT id FROM users WHERE fullname = '{$fullname}' AND email = '{$email}' LIMIT 1");

        if ($dbase->num_rows($check_duplicate) > 0) {
            $msg = "<div class='alert alert-danger'>An account with this full name and email already exists.</div>";
        } else {
            // Loop: generate unique SAC
            do {
                $sac = generate_sac();
                $check_sac = $dbase->query("SELECT id FROM users WHERE sac = '{$sac}' LIMIT 1");
            } while ($dbase->num_rows($check_sac) > 0);

            // Insert user
            $query = "INSERT INTO users (fullname, email, sac) VALUES ('{$fullname}', '{$email}', '{$sac}')";
            if ($dbase->query($query)) {
                $_SESSION['sac'] = $sac;
                $_SESSION['fullname'] = $fullname;
                $_SESSION['email'] = $email;
                redirect_to("success.php");
            } else {
                $msg = "<div class='alert alert-danger'>Registration failed. Please try again.</div>";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Register - SSNS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="stylesheet" href="css/style.css" />
</head>
<body>
  <?php include 'partials/header.php'; ?>

  <main>
    <section class="form-section p-4">
      <form method="post" action="register.php" class="verify-form">
        <h3 class="mb-3 text-center">Student Registration</h3>
        <?= $msg ?>
        <div class="mb-3">
          <input type="text" name="fullname" class="form-control" placeholder="Full Name" required />
        </div>
        <div class="mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email Address" required />
        </div>
        <button type="submit" class="btn btn-primary w-100">Register</button>
      </form>
    </section>
  </main>

  <?php include 'partials/footer.php'; ?>

  <script src="js/script.js"></script>
  <script src="js/bootstrap.js"></script>
</body>
</html>
