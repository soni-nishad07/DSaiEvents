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

    <title>D Sai Events - Gallery</title>

    <?php
    include 'favi.php';
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
        include 'top_header.php';
        ?>
        <!--end top header-->




        <!-- start page content wrapper-->
        <div class="page-content-wrapper">
            <!-- start page content-->
            <div class="page-content">

                <!--start breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Gallery</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0 align-items-center">
                                <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Display Gallery Details</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!--end breadcrumb-->




                <?php
                include '../connect.php'; // Include the database connection

                $query  = "SELECT id, image_path, alt_text FROM gallery ORDER BY id DESC";
                $result = mysqli_query($conn, $query);
                ?>

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0">Display Images Details</h5>
                        </div>
                        <div class="table-responsive mt-3">
                            <table class="table align-middle">
                                <thead class="table-secondary text-center">
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <?php
$counter = 1; // Start the counter from 1
?>
                                <tbody>
                                    <?php if (mysqli_num_rows($result) > 0): ?>
                                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                            <tr>
                                                <!-- <td><?php echo htmlspecialchars($row['id']) ?></td> -->
                                                <td><?= $counter++ ?></td> 
                                                <td>
                                                    <div class="d-flex align-items-center gap-1 cursor-pointer grly_box">
                                                        <img src="<?php echo htmlspecialchars($row['image_path']) ?>" class="gallery-img" alt="<?php echo htmlspecialchars($row['alt_text']) ?>">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="table-actions d-flex align-items-center gap-2 fs-6">
                                                        <a href="gallery_edit.php?id=<?php echo $row['id'] ?>" class="text-warning " data-bs-toggle="tooltip" title="Edit">
                                                            <i class="fadeIn animated bx bx-edit  gly_btns"></i>
                                                        </a>
                                                        <a href="gallery_delete.php?id=<?php echo $row['id'] ?>" class="text-danger" data-bs-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure you want to delete this image?');">
                                                            <i class="fadeIn animated bx bx-trash-alt  gly_btns"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endwhile; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="3" class="text-center">No images found.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- end page content-->
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
        <a href="javaScript:;" class="back-to-top"><ion-icon name="arrow-up-outline"></ion-icon></a>
        <!--End Back To Top Button-->




        <!--start switcher-->
        <?php
        include 'custom_theme.php';
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