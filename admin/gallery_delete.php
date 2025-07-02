<?php
include '../connect.php'; // Include database connection

// Check if 'id' is set in the URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']); // Sanitize input

    // Fetch the image path before deleting
    $query = "SELECT image_path FROM gallery WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        $file_path = $row['image_path'];

        // Delete the file from the server if it exists
        if (!empty($file_path) && file_exists($file_path)) {
            unlink($file_path);
        }

        // Delete the record from the database
        $delete_query = "DELETE FROM gallery WHERE id = ?";
        $delete_stmt = mysqli_prepare($conn, $delete_query);
        mysqli_stmt_bind_param($delete_stmt, "i", $id);

        if (mysqli_stmt_execute($delete_stmt)) {
            echo "<script>alert('Image deleted successfully!'); window.location.href='gallery_show.php';</script>";
        } else {
            echo "<script>alert('Error deleting record from database.'); window.location.href='gallery_show.php';</script>";
        }

        // Close delete statement
        mysqli_stmt_close($delete_stmt);
    } else {
        echo "<script>alert('Image not found.'); window.location.href='gallery_show.php';</script>";
    }

    // Close statements
    mysqli_stmt_close($stmt);
} else {
    echo "<script>alert('Invalid request.'); window.location.href='gallery_show.php';</script>";
}

// Close database connection
mysqli_close($conn);
?>
