<?php
session_start();
include 'config.php';

if (!isset($_SESSION['employee'])) {
    header("Location: index.php");
    exit();
}

$name = $_SESSION['employee'];

$result = $conn->query("SELECT * FROM leaves WHERE name='$name' ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Employee Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="dashboard-container">

    <div class="header">
        <h2>Welcome, <?php echo $name; ?> 👋</h2>
        <div class="header-buttons">
            <a href="apply.php" class="btn apply-btn">Apply Leave</a>
        </div>
    </div>

    <div class="table-card">
        <h3>Your Leave History</h3>

        <table>
            <tr>
                <th>Name</th>
                <th>Leave Type</th>
                <th>From</th>
                <th>To</th>
                <th>Reason</th>
                <th>Status</th>
            </tr>

            <?php while($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['leave_type']; ?></td>
                <td><?php echo $row['from_date']; ?></td>
                <td><?php echo $row['to_date']; ?></td>
                <td><?php echo $row['reason']; ?></td>
                <td>
                    <span class="status 
                        <?php 
                            if($row['status']=="Approved") echo "approved";
                            elseif($row['status']=="Rejected") echo "rejected";
                            else echo "pending";
                        ?>">
                        <?php echo $row['status']; ?>
                    </span>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
            <a href="download.php">
<button>Download Leave History</button>
</a>
  <a href="logout.php" class="btn logout-btn">Logout</a>

</div>


</body>
</html>



