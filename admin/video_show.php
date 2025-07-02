

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



        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Gallery</div>
                </div>

                <?php
include '../connect.php';

// Fetch videos
$query_videos = "SELECT id, video_path, video_title FROM videos ORDER BY id DESC";
$result_videos = mysqli_query($conn, $query_videos);
?>

<div class="card">
    <div class="card-body">
        <h5 class="mb-3">Display Video Details</h5>
        <div class="table-responsive">
            <table class="table align-middle text-center">
                <thead class="table-secondary">
                    <tr>
                        <th>#</th>
                        <th>Video</th>
                        <th>Title</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $counter = 1;
                    if (mysqli_num_rows($result_videos) > 0):
                        while ($video = mysqli_fetch_assoc($result_videos)): ?>
                            <tr>
                                <td><?= $counter++ ?></td>
                                <td>
                                    <video width="150" controls>
                                        <source src="<?= htmlspecialchars($video['video_path']) ?>" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </td>
                                <td><?= htmlspecialchars($video['video_title']) ?></td>
                                <td>
                                   
                                    <!-- <a href="video_delete.php?id=<?= $video['id'] ?>" class="text-danger"
                                       onclick="return confirm('Are you sure you want to delete this video?');"
                                       title="Delete">
                                        <i class="bx bx-trash-alt"></i>
                                    </a> -->

                                    <a href="video_delete.php?id=<?= $video['id'] ?>" class="text-danger"
   onclick="return confirm('Are you sure you want to delete this video?');" title="Delete">
   <i class="bx bx-trash-alt"></i>
</a>


                                </td>
                            </tr>
                        <?php endwhile;
                    else: ?>
                        <tr>
                            <td colspan="4" class="text-center">No videos found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


            </div>
        </div>

        <div class="footer-container text-center mt-4">
            <h6>COPYRIGHT © <script>document.write(new Date().getFullYear());</script> D Sai Events. All Rights Reserved. Designed by 
                <a href="https://www.rpinfocare.com/">Rp Infocare</a>
            </h6>
        </div>
    </div>



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