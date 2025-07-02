
<?php
include '../connect.php'; // Include database connection

// Check if 'id' is set in the URL
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<script>alert('Invalid request.'); window.location.href='gallery_show.php';</script>";
    exit;
}

$id = intval($_GET['id']); // Sanitize input

// Fetch the existing record
$query = "SELECT image_path, alt_text FROM gallery WHERE id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (!$row = mysqli_fetch_assoc($result)) {
    echo "<script>alert('Image not found.'); window.location.href='gallery_show.php';</script>";
    exit;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $alt_text = mysqli_real_escape_string($conn, $_POST['alt_text']);
    $new_image = $_FILES['image']['name'];
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($new_image);

    // If a new image is uploaded, replace the old one
    if (!empty($new_image)) {
        // Delete the old image
        if (!empty($row['image_path']) && file_exists($row['image_path'])) {
            unlink($row['image_path']);
        }

        // Move new file
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            $update_query = "UPDATE gallery SET image_path = ?, alt_text = ? WHERE id = ?";
            $update_stmt = mysqli_prepare($conn, $update_query);
            mysqli_stmt_bind_param($update_stmt, "ssi", $target_file, $alt_text, $id);
        } else {
            echo "<script>alert('Error uploading new image.'); window.location.href='gallery_show.php';</script>";
            exit;
        }
    } else {
        // Update only the title
        $update_query = "UPDATE gallery SET alt_text = ? WHERE id = ?";
        $update_stmt = mysqli_prepare($conn, $update_query);
        mysqli_stmt_bind_param($update_stmt, "si", $alt_text, $id);
    }

    // Execute update query
    if (mysqli_stmt_execute($update_stmt)) {
        echo "<script>alert('Image updated successfully!'); window.location.href='gallery_show.php';</script>";
    } else {
        echo "<script>alert('Error updating record.'); window.location.href='gallery_show.php';</script>";
    }

    mysqli_stmt_close($update_stmt);
}

// Close statements
mysqli_stmt_close($stmt);
mysqli_close($conn);
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

    <title>D Sai Events - Gallery</title>

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
              <div class="breadcrumb-title pe-3">Gallery</div>
              <div class="ps-3">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0 p-0 align-items-center">
                    <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Photos Gallery of DSai Events</li>
                  </ol>
                </nav>
              </div>
            </div>
            <!--end breadcrumb-->



            <section class="gallery">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <div class="border p-3 rounded">
                                <h6 class="mb-0 text-uppercase">Edit Image </h6>
                                <hr>
                                <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Image Title</label>
                <input type="text" name="alt_text" class="form-control" value="<?= htmlspecialchars($row['alt_text']) ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Current Image</label>
                <div>
                    <img src="<?= htmlspecialchars($row['image_path']) ?>" alt="<?= htmlspecialchars($row['alt_text']) ?>" style="max-width: 200px;">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Upload New Image (Optional)</label>
                <input type="file" name="image" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="gallery_list.php" class="btn btn-secondary">Cancel</a>
        </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </section>

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