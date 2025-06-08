
<?php
require_once("bin/functions/session.php");
require_once("bin/functions/functions.php");

if (!isset($_SESSION['admin_id'])) {
    redirect_to("admin_login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
  <div class="container mt-5">
    <h2>Welcome, <?php echo htmlentities($_SESSION['admin_user']); ?></h2>
    <p><a href="logout.php" class="btn btn-danger">Logout</a></p>
    <!-- Additional admin controls go here -->
  </div>
</body>
</html>
