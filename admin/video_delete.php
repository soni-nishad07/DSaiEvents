<?php
include '../connect.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $video_id = intval($_GET['id']);

    // Fetch video path
    $query = "SELECT video_path FROM videos WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $video_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $video_path);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    if ($video_path) {
        // Delete the video file from the server
        if (file_exists($video_path)) {
            unlink($video_path);
        }

        // Delete record from the database
        $delete_query = "DELETE FROM videos WHERE id = ?";
        $stmt = mysqli_prepare($conn, $delete_query);
        mysqli_stmt_bind_param($stmt, "i", $video_id);
        
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            echo "<script>alert('Video deleted successfully!'); window.location.href='video_show.php';</script>";
        } else {
            echo "<script>alert('Error deleting video.'); window.location.href='video_show.php';</script>";
        }
    } else {
        echo "<script>alert('Video not found.'); window.location.href='video_show.php';</script>";
    }
} else {
    echo "<script>alert('Invalid request.'); window.location.href='video_show.php';</script>";
}
?>
