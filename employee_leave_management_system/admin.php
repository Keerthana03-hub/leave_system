<?php
session_start();
include 'config.php';

/* Dashboard Statistics */

$total_query = "SELECT COUNT(*) AS total FROM leaves";
$total_result = $conn->query($total_query);
$total = $total_result->fetch_assoc()['total'];

$pending_query = "SELECT COUNT(*) AS pending FROM leaves WHERE status='Pending'";
$pending_result = $conn->query($pending_query);
$pending = $pending_result->fetch_assoc()['pending'];

$approved_query = "SELECT COUNT(*) AS approved FROM leaves WHERE status='Approved'";
$approved_result = $conn->query($approved_query);
$approved = $approved_result->fetch_assoc()['approved'];

$rejected_query = "SELECT COUNT(*) AS rejected FROM leaves WHERE status='Rejected'";
$rejected_result = $conn->query($rejected_query);
$rejected = $rejected_result->fetch_assoc()['rejected'];

/* Leave Requests Table */

$sql = "SELECT * FROM leaves";
$result = $conn->query($sql);

if (!$result) {
    die("Query Failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="main">

<h2>Admin Dashboard</h2>

<div class="cards">

<div class="card">
<h3>Total Leaves</h3>
<p><?php echo $total; ?></p>
</div>

<div class="card">
<h3>Pending</h3>
<p><?php echo $pending; ?></p>
</div>

<div class="card">
<h3>Approved</h3>
<p><?php echo $approved; ?></p>
</div>

<div class="card">
<h3>Rejected</h3>
<p><?php echo $rejected; ?></p>
</div>

</div>

<h2>Leave Requests</h2>

<table>
<tr>
<th>Name</th>
<th>Leave Type</th>
<th>From</th>
<th>To</th>
<th>Reason</th>
<th>Status</th>
<th>Action</th>
</tr>

<?php while($row = $result->fetch_assoc()) { ?>

<tr>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['leave_type']; ?></td>
<td><?php echo $row['from_date']; ?></td>
<td><?php echo $row['to_date']; ?></td>
<td><?php echo $row['reason']; ?></td>
<td><?php echo $row['status']; ?></td>

<td>
<?php if($row['status'] == 'Pending') { ?>
<a href="update_status.php?id=<?php echo $row['id']; ?>&status=Approved">Approve</a> |
<a href="update_status.php?id=<?php echo $row['id']; ?>&status=Rejected">Reject</a>
<?php } else { ?>
Done
<?php } ?>
</td>

</tr>

<?php } ?>

</table>
<a href="download_leaves.php">
<button>Download Leave Report</button>
</a>

<br>
<a href="logout.php">Logout</a>

</div>

</body>
</html>



