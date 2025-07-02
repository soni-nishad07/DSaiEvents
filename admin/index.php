<?php
session_start();
include '../connect.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (!empty($email) && !empty($password)) {
        // Use prepared statements to prevent SQL Injection
        $sql = "SELECT id, email, password FROM admin_users WHERE email = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);

            // Verify the hashed password
            if (password_verify($password, $user['password'])) {
                $_SESSION['admin_email'] = $user['email'];
                $_SESSION['admin_id'] = $user['id'];

                // JavaScript alert and redirect
                echo "<script>
                    alert('Login Successful! Welcome, " . $user['email'] . "');
                    window.location.href = 'dashboard.php';
                </script>";
                exit();
            } else {
                $error = "Invalid email or password!";
            }
        } else {
            $error = "Invalid email or password!";
        }
    } else {
        $error = "Please enter both email and password!";
    }
}
?>


<!doctype html>
<html lang="en" class="light-theme">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- loader-->
  <link href="assets/css/pace.min.css" rel="stylesheet" />
  <script src="assets/js/pace.min.js"></script>

  <!--plugins-->
  <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/bootstrap-extended.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">

  <!-- favicons -->
  <link rel="icon" type="image/png" sizes="32x32" href="favicon.png">
  <link rel="icon" type="image/x-icon" href="../images/favicon.ico">

  <title>D Sai Events - Admin</title>
</head>

<body>

  <!--start wrapper-->
  <div class="wrapper">
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-transparent p-3">
        <div class="container">
          <a href="javascript:;">
            <!-- <img src="assets/images/logo-icon-3.png" width="140" alt="" /> -->
          </a>
        </div>
      </nav>
    </header>



    <div class="container">

    <div class="row">
    <img src="logo.png" alt="" style="width:85px;height:100%;margin:auto;" /></a>
    </div>


    <div class="row">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
          <div class="card radius-10">
            <div class="card-body p-4">
              <div class="text-center">
                <h4>Admin Login</h4>
              </div>

              <?php if (isset($error)) { echo "<div class='alert alert-danger'>$error</div>"; } ?>

              <form method="POST">
                <div class="col-12 mt-5">
                  <label class="form-label">Email</label>
                  <input type="email" name="email" class="form-control" required>
                </div>
                <div class="col-12 mt-3">
                  <label class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" required>
                </div>

                <div class="col-12 col-lg-6 mt-3">
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">Remember Me</label>
                  </div>
                </div>

                <div class="col-12 col-lg-12 mt-3">
                  <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Login</button>
                  </div>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
      

    </div>
    <footer class="my-5">
    <div class="footer-container">
    <h6 class="text-center copyright">
        COPYRIGHT @ <script>document.write(new Date().getFullYear());</script>
        D Sai Events, ALL RIGHTS RESERVED. Designed by
        <span>
            <a href="https://www.rpinfocare.com/">Rp Infocare</a>
        </span>
    </h6>
</div>


    </footer>
  </div>
  <!--end wrapper-->


</body>


</html>