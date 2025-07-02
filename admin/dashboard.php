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
    <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
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

    <title>D Sai Events - Dashboard</title>

    <?php
      include('favi.php')
    ?>

  </head>
  <body>
    

 <!--start wrapper-->
    <div class="wrapper">
       <!--start sidebar -->
       <?php
      include('sidebar.php');
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
            <div class="breadcrumb-title pe-3">Dashboard</div>
            <div class="ps-3">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0 align-items-center">
                  <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">Analytics</li>
                </ol>
              </nav>
            </div>
          </div>
          <!--end breadcrumb-->






          <?php
include '../connect.php';

// Fetch total inquiries from contact_form
$sql_inquiries = "SELECT COUNT(*) AS total_inquiries FROM contact_form";
$result_inquiries = $conn->query($sql_inquiries);
$total_inquiries = ($result_inquiries) ? $result_inquiries->fetch_assoc()['total_inquiries'] : 0;

// Fetch total gallery images from gallery
$sql_gallery = "SELECT COUNT(*) AS total_images FROM gallery";
$result_gallery = $conn->query($sql_gallery);
$total_images = ($result_gallery) ? $result_gallery->fetch_assoc()['total_images'] : 0;

// Fetch total admin users from admin_users
$sql_admins = "SELECT COUNT(*) AS total_admins FROM admin_users";
$result_admins = $conn->query($sql_admins);
$total_admins = ($result_admins) ? $result_admins->fetch_assoc()['total_admins'] : 0;

$conn->close();
?>

<div class="row">
    <!-- Total Inquiries -->
    <div class="col-12 col-lg-6 col-xl-6">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between">
                    <div>
                        <p class="mb-2">Total Inquiries</p>
                        <h4 class="mb-0"><?php echo $total_inquiries; ?> <span class="ms-1 font-13 text-success">+10%</span></h4>
                    </div>
                    <div class="fs-5">
                        <ion-icon name="chatbubble-ellipses-outline"></ion-icon>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Gallery Images -->
    <div class="col-12 col-lg-6 col-xl-6">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between">
                    <div>
                        <p class="mb-2">Total Gallery Images</p>
                        <h4 class="mb-0"><?php echo $total_images; ?> <span class="ms-1 font-13 text-info">+5%</span></h4>
                    </div>
                    <div class="fs-5">
                        <ion-icon name="images-outline"></ion-icon>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Admin Users -->
    <div class="col-12 col-lg-6 col-xl-6">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between">
                    <div>
                        <p class="mb-2">Total Admins</p>
                        <h4 class="mb-0"><?php echo $total_admins; ?> <span class="ms-1 font-13 text-warning">+2%</span></h4>
                    </div>
                    <div class="fs-5">
                        <ion-icon name="person-outline"></ion-icon>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

 
          

          </div>
          <!-- end page content-->
         </div>
         <!--end page content wrapper-->





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
    <script src="assets/plugins/chartjs/chart.min.js"></script>
    <script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
    <script src="assets/js/index2.js"></script>
    <!-- Main JS-->
    <script src="assets/js/main.js"></script>


  </body>

<!-- Mirrored from codervent.com/synui/demo/collapsed-menu/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Feb 2025 08:33:20 GMT -->
</html>