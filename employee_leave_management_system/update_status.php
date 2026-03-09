<?php
include 'config.php';

if (isset($_GET['id']) && isset($_GET['status'])) {

    $id = $_GET['id'];
    $status = $_GET['status'];

    $sql = "UPDATE leaves SET status='$status' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: admin.php");
        exit();
    } else {
        echo "Update Failed: " . $conn->error;
    }
} else {
    echo "Invalid Request";
}

$conn->close();
?>
