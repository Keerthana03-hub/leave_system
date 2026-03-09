<?php
session_start();
include "config.php";

$name = $_SESSION['employee'];

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="leave_history.csv"');

$output = fopen("php://output", "w");

fputcsv($output, ['Name','Leave Type','From','To','Reason','Status']);

$result = $conn->query("SELECT * FROM leaves WHERE name='$name'");

while($row = $result->fetch_assoc()){
    fputcsv($output, [
        $row['name'],
        $row['type'],
        $row['from_date'],
        $row['to_date'],
        $row['reason'],
        $row['status']
    ]);
}

fclose($output);
?>