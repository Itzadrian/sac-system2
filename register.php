<?php
require_once("bin/functions/session.php");
require_once("bin/functions/functions.php");
require_once("bin/functions/dbase.php");

$msg = "";

function generate_sac() {
    return strval(mt_rand(10000000000, 99999999999));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $surname = trim($_POST['surname']);
    $middle_name = trim($_POST['middle_name']);
    $other_name = trim($_POST['other_name']);
    $gender = trim($_POST['gender']);
    $dob = trim($_POST['dob']);
    $state = trim($_POST['state']);
    $lga = trim($_POST['lga']);
    $school = trim($_POST['school']);
    $department = trim($_POST['department']);
    $course_level = trim($_POST['course_level']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);
    $marital_status = trim($_POST['marital_status']);
    $email = trim($_POST['email']);
    $user_type = trim($_POST['user_type']);
    $id_number = trim($_POST['id_number']);

    if (empty($surname) || empty($gender) || empty($dob) || empty($email) || empty($user_type) || empty($id_number)) {
        $msg = "<div class='alert alert-danger'>Please fill in all required fields.</div>";
    } else {
        foreach ($_POST as $key => $value) {
            $_POST[$key] = $dbase->escape_value($value);
        }

        $check_duplicate = $dbase->query("SELECT id FROM users WHERE surname = '{$_POST['surname']}' AND email = '{$_POST['email']}' LIMIT 1");
        if ($dbase->num_rows($check_duplicate) > 0) {
            $msg = "<div class='alert alert-danger'>An account with this surname and email already exists.</div>";
        } else {
            do {
                $sac = generate_sac();
                $check_sac = $dbase->query("SELECT id FROM users WHERE sac = '{$sac}' LIMIT 1");
            } while ($dbase->num_rows($check_sac) > 0);

            $query = "INSERT INTO users (surname, middle_name, other_name, gender, dob, state, lga, school, department, course_level, phone, address, marital_status, email, user_type, id_number, sac)
                      VALUES (
                        '{$_POST['surname']}', '{$_POST['middle_name']}', '{$_POST['other_name']}', '{$_POST['gender']}', '{$_POST['dob']}',
                        '{$_POST['state']}', '{$_POST['lga']}', '{$_POST['school']}', '{$_POST['department']}', '{$_POST['course_level']}',
                        '{$_POST['phone']}', '{$_POST['address']}', '{$_POST['marital_status']}', '{$_POST['email']}', '{$_POST['user_type']}',
                        '{$_POST['id_number']}', '{$sac}'
                      )";

            if ($dbase->query($query)) {
                $_SESSION['sac'] = $sac;
                $_SESSION['fullname'] = $_POST['surname'] . ' ' . $_POST['middle_name'] . ' ' . $_POST['other_name'];
                $_SESSION['email'] = $_POST['email'];
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
        <h3 class="mb-3 text-center">User Registration</h3>
        <?= $msg ?>

        <div class="mb-3"><input type="text" name="surname" class="form-control" placeholder="Surname" required /></div>
        <div class="mb-3"><input type="text" name="middle_name" class="form-control" placeholder="Middle Name" /></div>
        <div class="mb-3"><input type="text" name="other_name" class="form-control" placeholder="Other Name" /></div>
        
        <div class="mb-3">
          <select name="user_type" id="user_type" class="form-control" required onchange="toggleFields()">
            <option value="">Select User Type</option>
            <option value="student">Student</option>
            <option value="staff">Staff</option>
          </select>
        </div>
        
        <div class="mb-3">
          <select name="gender" class="form-control" required>
            <option value="">Select Gender</option>
            <option>Male</option>
            <option>Female</option>
          </select>
        </div>

        <div class="mb-3"><input type="date" name="dob" class="form-control" required /></div>
        <div class="mb-3"><input type="text" name="state" class="form-control" placeholder="State of Origin" required /></div>
        <div class="mb-3"><input type="text" name="lga" class="form-control" placeholder="LGA of Origin" required /></div>


        <div class="mb-3">
          <label id="idLabel" for="id_number" class="form-label">Matric Number / Staff ID</label>
          <input type="text" name="id_number" id="id_number" class="form-control" required />
        </div>

        <div id="school_fields">
          <div class="mb-3"><input type="text" name="school" class="form-control" placeholder="School" /></div>
          <div class="mb-3"><input type="text" name="department" class="form-control" placeholder="Department" /></div>
          <div class="mb-3"><input type="text" name="course_level" class="form-control" placeholder="Course Level" /></div>
        </div>

        <div class="mb-3"><input type="text" name="phone" class="form-control" placeholder="Phone Number" required /></div>
        <div class="mb-3"><input type="text" name="address" class="form-control" placeholder="Address" required /></div>

        <div class="mb-3">
          <select name="marital_status" class="form-control">
            <option value="">Marital Status</option>
            <option>Single</option>
            <option>Married</option>
            <option>Divorced</option>
          </select>
        </div>

        <div class="mb-3"><input type="email" name="email" class="form-control" placeholder="Email Address" required /></div>

        <button type="submit" class="btn btn-primary w-100">Register</button>
      </form>
    </section>
  </main>

  <?php include 'partials/footer.php'; ?>

  <script src="js/script.js"></script>
  <script src="js/bootstrap.js"></script>
  <script>
    function toggleFields() {
      const userType = document.getElementById('user_type').value;
      const schoolFields = document.getElementById('school_fields');
      const idLabel = document.getElementById('idLabel');

      if (userType === 'staff') {
        schoolFields.style.display = 'none';
        idLabel.textContent = "Staff ID";
      } else if (userType === 'student') {
        schoolFields.style.display = 'block';
        idLabel.textContent = "Matric Number";
      } else {
        schoolFields.style.display = 'none';
        idLabel.textContent = "Matric Number / Staff ID";
      }
    }

    document.addEventListener('DOMContentLoaded', toggleFields);
  </script>
</body>
</html>
