<?php
// Include database connection
include '../connect.php';

// Get user ID from URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
} else {
    echo "<script>alert('Invalid request!'); window.location.href = 'admin_list.php';</script>";
    exit();
}

// Fetch admin user data
$query = "SELECT id, username, email FROM admin_users WHERE id = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if (!$row) {
    echo "<script>alert('Admin user not found!'); window.location.href = 'admin_list.php';</script>";
    exit();
}

// Handle form submission for profile update
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_profile'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $update_query = "UPDATE admin_users SET username='$username', email='$email' WHERE id = $id";

    if (mysqli_query($conn, $update_query)) {
        echo "<script>alert('Profile updated successfully!'); window.location.href = 'edit_profile.php?id=$id';</script>";
    } else {
        echo "<script>alert('Error updating profile.');</script>";
    }
}

// Handle form submission for password change
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['change_password'])) {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Fetch the current password from DB
    $pass_query = "SELECT password FROM admin_users WHERE id = $id";
    $pass_result = mysqli_query($conn, $pass_query);
    $pass_row = mysqli_fetch_assoc($pass_result);

    if (password_verify($current_password, $pass_row['password'])) {
        if ($new_password === $confirm_password) {
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $update_pass_query = "UPDATE admin_users SET password='$hashed_password' WHERE id = $id";
            if (mysqli_query($conn, $update_pass_query)) {
                echo "<script>alert('Password updated successfully!'); window.location.href = 'edit_profile.php?id=$id';</script>";
            } else {
                echo "<script>alert('Error updating password.');</script>";
            }
        } else {
            echo "<script>alert('New passwords do not match!');</script>";
        }
    } else {
        echo "<script>alert('Current password is incorrect!');</script>";
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
    <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />

    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">

    <!--Theme Styles-->
    <link href="assets/css/dark-theme.css" rel="stylesheet" />
    <link href="assets/css/semi-dark.css" rel="stylesheet" />
    <link href="assets/css/header-colors.css" rel="stylesheet" />

    <title>D Sai Events - Profile</title>

    <?php
    include('favi.php')
    ?>

</head>

<body>


    <!--start wrapper-->
    <div class="wrapper">


        <!--start sidebar -->
        <?php
        include 'sidebar.php';
        ?>
        <!--end sidebar -->




        <!--start top header-->
        <?php
        include('top_header.php');
        ?>
        <!--end top header-->





        <!-- start page content wrapper-->
        <div class="page-content-wrapper">
            <!-- start page content-->
            <div class="page-content">

                <!--start breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Profile</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0 align-items-center">
                                <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!--end breadcrumb-->



                <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card radius-10">
                <div class="card-body">

                    <h3>Edit Admin Profile</h3>

                    <form method="POST">
                        <h5 class="mb-3">Profile Details</h5>
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" value="<?php echo htmlspecialchars($row['username']); ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($row['email']); ?>">
                        </div>
                        <button type="submit" name="update_profile" class="btn btn-primary">Update Profile</button>
                    </form>

                    <hr>

                    <form method="POST">
                        <h5 class="mb-3">Change Password</h5>
                        <div class="mb-3">
                            <label class="form-label">Current Password</label>
                            <input type="password" class="form-control" name="current_password" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">New Password</label>
                            <input type="password" class="form-control" name="new_password" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Confirm New Password</label>
                            <input type="password" class="form-control" name="confirm_password" required>
                        </div>
                        <button type="submit" name="change_password" class="btn btn-success">Update Password</button>
                    </form>

                </div>
</div>
</div>
</div>





<div class="footer-container">
    <h6 class="text-center copyright">
        COPYRIGHT @ <script>document.write(new Date().getFullYear());</script>
        D Sai Events, ALL RIGHTS RESERVED. Designed by
        <span>
            <a href="https://www.rpinfocare.com/">Rp Infocare</a>
        </span>
    </h6>
</div>




            <!--Start Back To Top Button-->
            <a href="javaScript:;" class="back-to-top"> <i class="fadeIn animated bx bx-up-arrow-alt"></i></a>
            <!--End Back To Top Button-->



            <!--start switcher-->
            <?php
            include('custom_theme.php');
            ?>
            <!--end switcher-->



            <!--start overlay-->
            <div class="overlay nav-toggle-icon"></div>
            <!--end overlay-->

        </div>
        <!--end wrapper-->





        <!-- JS Files-->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
        <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script type="module" src="../../../../unpkg.com/ionicons%405.5.2/dist/ionicons/ionicons.esm.js"></script>
        <!--plugins-->
        <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>

        <!-- Main JS-->
        <script src="assets/js/main.js"></script>


</body>

</html>