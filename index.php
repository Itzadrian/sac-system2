<?php
require_once("bin/functions/session.php");
require_once("bin/functions/functions.php");
require_once("bin/functions/dbase.php");

$msg = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sac = strtoupper(trim($_POST['sac']));

    if (empty($sac)) {
        $msg = "<p class='error'>Please enter your SAC.</p>";
    } else {
        $sac = $dbase->escape_value($sac);

        // Check in the correct table: `users`
        $result = $dbase->query("SELECT * FROM users WHERE sac = '{$sac}' LIMIT 1");

        if ($dbase->num_rows($result) > 0) {
            $user = $dbase->fetch_array($result);

            $_SESSION['sac'] = $user['sac'];
            $_SESSION['fullname'] = $user['fullname'];
            $_SESSION['email'] = $user['email'];

            redirect_to("dashboard.php");
        } else {
            $msg = "<p class='error'>Invalid SAC. Please try again.</p>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SSNS - FPN</title>
  <link rel="stylesheet" href="css/style.css"/>
  <link rel="stylesheet" href="css/bootstrap.css">
  <style>
    form.verify-form {
      margin: 40px auto;
      max-width: 400px;
      padding: 1.5em;
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 0 10px #aaa;
      text-align: center;
    }
    form.verify-form input[type="text"] {
      width: 80%;
      padding: 10px;
      margin-bottom: 1em;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    form.verify-form button {
      padding: 10px 20px;
      background-color: #007bff;
      border: none;
      color: white;
      border-radius: 5px;
      cursor: pointer;
    }
    .error {
      color: red;
    }
  </style>
</head>
<body>
  <!-- <header>
    <div class="logo">Social Security Numbering System - FPN</div>
    <nav class="topnav" id="myTopnav">
      <a href="#" class="active">Home</a>
      <a href="#news">Campus Updates</a>
      <a href="register.php">Sign Up</a>
      <a href="login.php">Login</a>
      <a href="#contact">Contact Us</a>
      <a href="javascript:void(0);" class="icon" onclick="toggleNav()">
        <i class="fa fa-bars"></i>
      </a>
      <button id="theme-toggle" title="Toggle Dark/Light Mode">🌓</button>
    </nav>
  </header> -->
  <?php include 'partials/header.php'; ?>

  <main>
    <!-- Hero Section -->
    <section class="hero">
      <div class="hero-slider">
        <div class="hero-slide"></div>
        <div class="hero-slide"></div>
        <div class="hero-slide"></div>
        <div class="hero-slide"></div>
      </div>
      <div class="hero-content">
        <h1 class="display-1">Welcome to the Social Security Numbering System (SSNS) for Students of Federal Polytechnic, Nasarawa State</h1>
        <!-- <h2>Register | Generate | Retrieve | View Existing Details</h2> -->
        <p class="display-6">Your security and privacy are our priority.</p>
      </div>
    </section>

    <!-- Scrolling Slider -->
    <section class="slider-container">
      <div class="slider-track">
        <div class="slider-item">🔒 Secure ID Management</div>
        <div class="slider-item">🎓 Student Registration Made Easy</div>
        <div class="slider-item">📄 View & Retrieve Existing Records</div>
        <div class="slider-item">🔄 Fast Updates & Sync</div>
        <div class="slider-item">🔒 Secure ID Management</div>
        <div class="slider-item">🎓 Student Registration Made Easy</div>
        <div class="slider-item">📄 View & Retrieve Existing Records</div>
        <div class="slider-item">🔄 Fast Updates & Sync</div>
      </div>
    </section>

    <!-- SAC Verification Form -->
     <section id="verify" class="container my-5">
        <div class="card shadow mx-auto p-4" style="max-width: 500px;">
            <h3 class="text-center mb-3">Enter Your Security Access Code (SAC)</h3>
            <?php if (!empty($msg)) echo $msg; ?>
            <form method="post" action="index.php">
                <div class="mb-3">
                    <input type="text" name="sac" class="form-control" placeholder="E.g. 123456" required />
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Verify</button>
                </div>
            </form>
        </div>
    </section>

  </main>

  <!-- <footer>
    <a href="#report">Report Abuse</a> |
    <a href="#copyright">Copyright</a> |
    <a href="#privacy">Privacy Policy</a> |
    <a href="#terms">Terms &amp; Conditions</a>
  </footer> -->
  <?php include 'partials/footer.php'; ?>

  <script>
    function toggleNav() {
      var x = document.getElementById("myTopnav");
      if (x.className === "topnav") {
        x.className += " responsive";
      } else {
        x.className = "topnav";
      }
    }
  </script>
  <script src="js/script.js"></script>
  <script src="js/bootstrap.js"></script>
</body>
</html>



