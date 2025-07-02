<?php
include '../connect.php'; // Include database connection

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Ensure ID is an integer for security

    // Delete query
    $sql = "DELETE FROM contact_form WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Record deleted successfully'); window.location.href='Inquiry.php';</script>";
    } else {
        echo "<script>alert('Error deleting record: " . $conn->error . "'); window.location.href='Inquiry.php';</script>";
    }

    $conn->close();
} else {
    echo "<script>alert('Invalid request'); window.location.href='Inquiry.php';</script>";
}
?>
