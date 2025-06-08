<?php
require_once("bin/functions/dbase.php");
require_once("bin/functions/functions.php");
require_once("bin/functions/session.php");

$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM admins WHERE username = '{$dbase->escape_value($username)}' LIMIT 1";
    $result = $dbase->query($sql);

    if ($dbase->num_rows($result) == 1) {
        $admin = $dbase->fetch_array($result);
        if (password_verify($password, $admin['password'])) {
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_user'] = $admin['username'];
            redirect_to("admin_dashboard.php");
        } else {
            $msg = "Invalid credentials.";
        }
    } else {
        $msg = "Invalid credentials.";
    }
}
?>

<!-- HTML form -->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Login</title>
  <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <div class="card mx-auto" style="max-width: 400px;">
      <div class="card-body">
        <h4 class="card-title text-center">Admin Login</h4>
        <?php if (!empty($msg)) echo "<div class='alert alert-danger'>{$msg}</div>"; ?>
        <form method="post" action="">
          <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required>
          </div>
          <div class="form-group mt-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
          </div>
          <button type="submit" class="btn btn-primary w-100 mt-4">Login</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>