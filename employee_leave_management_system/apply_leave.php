<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $leave_type = $_POST['leave_type'];
    $from_date = $_POST['from_date'];
    $to_date = $_POST['to_date'];
    $reason = $_POST['reason'];

    $sql = "INSERT INTO leaves (name, leave_type, from_date, to_date, reason, status)
            VALUES ('$name', '$leave_type', '$from_date', '$to_date', '$reason', 'Pending')";

    if ($conn->query($sql) === TRUE) {

        echo "<script>
                alert('Your leave request has been submitted successfully!');
                window.location.href='dashboard.php';
              </script>";

    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>