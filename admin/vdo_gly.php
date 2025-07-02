<!doctype html>
<html lang="en" class="light-theme">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>D Sai Events - Gallery</title>

    <!-- CSS Files -->
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

                <?php
                include '../connect.php';

                // Fetch images
                $query = "SELECT id, image_path, alt_text FROM gallery ORDER BY id DESC";
                $result = mysqli_query($conn, $query);
                ?>

                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-3">Display Image Details</h5>
                        <div class="table-responsive">
                            <table class="table align-middle text-center">
                                <thead class="table-secondary">
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $counter = 1;
                                    if (mysqli_num_rows($result) > 0):
                                        while ($row = mysqli_fetch_assoc($result)): ?>
                                            <tr>
                                                <td><?= $counter++ ?></td>
                                                <td>
                                                    <img src="<?= htmlspecialchars($row['image_path']) ?>" 
                                                         class="gallery-img img-thumbnail" 
                                                         alt="<?= htmlspecialchars($row['alt_text']) ?>" 
                                                         width="100">
                                                </td>
                                                <td>
                                                    <a href="gallery_edit.php?id=<?= $row['id'] ?>" class="text-warning" title="Edit">
                                                        <i class="bx bx-edit"></i>
                                                    </a>
                                                    <a href="gallery_delete.php?id=<?= $row['id'] ?>" class="text-danger" 
                                                       onclick="return confirm('Are you sure you want to delete this image?');"
                                                       title="Delete">
                                                        <i class="bx bx-trash-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endwhile;
                                    else: ?>
                                        <tr>
                                            <td colspan="3" class="text-center">No images found.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Video Upload Section -->
                <section class="gallery">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-8 mx-auto">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="mb-3">Upload Video</h6>
                                        <form action="upload_video.php" method="POST" enctype="multipart/form-data">
                                            <div class="mb-3">
                                                <label class="form-label">Video Title</label>
                                                <input type="text" name="video_title" class="form-control" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Upload Video</label>
                                                <input type="file" name="video" class="form-control" accept="video/*" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary w-100">Upload</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>

        <div class="footer-container text-center mt-4">
            <h6>COPYRIGHT © <script>document.write(new Date().getFullYear());</script> D Sai Events. All Rights Reserved. Designed by 
                <a href="https://www.rpinfocare.com/">Rp Infocare</a>
            </h6>
        </div>
    </div>

    <!-- JS Files -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>

</body>
</html>
