<?php
include('../connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $video_title = mysqli_real_escape_string($conn, $_POST['video_title']);

    if (isset($_FILES['video']) && $_FILES['video']['error'] == 0) {
        $video = $_FILES['video']['name'];
        $target_dir = "../uploads/videos/";
        $videoFileType = strtolower(pathinfo($video, PATHINFO_EXTENSION));

        // Allowed video formats
        $allowed_formats = array("mp4", "avi", "mov", "wmv", "flv", "mkv", "webm");
        $max_file_size = 100 * 1024 * 1024; // 100MB limit

        if (in_array($videoFileType, $allowed_formats)) {
            if ($_FILES['video']['size'] <= $max_file_size) {
                // Ensure unique filename
                $unique_name = uniqid() . "_" . basename($video);
                $target_file = $target_dir . $unique_name;

                if (move_uploaded_file($_FILES['video']['tmp_name'], $target_file)) {
                    $query = "INSERT INTO videos (video_path, video_title, uploaded_at) VALUES (?, ?, NOW())";
                    $stmt = mysqli_prepare($conn, $query);
                    mysqli_stmt_bind_param($stmt, "ss", $target_file, $video_title);

                    if (mysqli_stmt_execute($stmt)) {
                        echo "<script>alert('Video uploaded successfully!'); window.location.href='video_show.php';</script>";
                    } else {
                        echo "<script>alert('Database error: Could not upload video.'); window.location.href='videos.php';</script>";
                    }
                    mysqli_stmt_close($stmt);
                } else {
                    echo "<script>alert('Error uploading file.'); window.location.href='videos.php';</script>";
                }
            } else {
                echo "<script>alert('File is too large. Maximum allowed size is 100MB.'); window.location.href='videos.php';</script>";
            }
        } else {
            echo "<script>alert('Invalid file format. Allowed formats: MP4, AVI, MOV, WMV, FLV, MKV, WEBM.'); window.location.href='videos.php';</script>";
        }
    } else {
        echo "<script>alert('Please select a valid video file.'); window.location.href='videos.php';</script>";
    }
}
?>






<!doctype html>
<html lang="en" class="light-theme">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>D Sai Events - Video Gallery</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <?php include 'sidebar.php'; ?>
        <?php include 'top_header.php'; ?>
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Gallery</div>
                </div>
           
                <section class="gallery">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-8 mx-auto">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="mb-0 text-uppercase">Video Upload Form</h6>
                                        <hr>
                                        <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
                                            <div class="col-12">
                                                <label class="form-label">Video Title</label>
                                                <input type="text" name="video_title" class="form-control" required>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Upload Video</label>
                                                <input type="file" name="video" class="form-control" accept="video/*" required>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary">Upload</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
        <div class="footer-container">
            <h6 class="text-center">COPYRIGHT @ <script>document.write(new Date().getFullYear());</script> D Sai Events, ALL RIGHTS RESERVED.</h6>
        </div>
    </div>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
