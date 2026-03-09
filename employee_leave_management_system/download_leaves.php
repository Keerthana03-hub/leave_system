<?php
include 'config.php';

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="leave_report.csv"');

$output = fopen("php://output", "w");

// column headings
fputcsv($output, array('Name','Leave Type','From Date','To Date','Reason','Status'));

$sql = "SELECT * FROM leaves";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()){

fputcsv($output, array(
$row['name'],
$row['leave_type'],
$row['from_date'],
$row['to_date'],
$row['reason'],
$row['status']
));

}

fclose($output);
exit();
?>