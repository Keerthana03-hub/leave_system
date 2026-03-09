<?php
session_start();
if (!isset($_SESSION['employee'])) {
    header("Location: index.php");
    exit();
}
$name = $_SESSION['employee'];
?>

<!DOCTYPE html>
<html>
<head>
<title>Apply Leave</title>

<style>

body{
    font-family: Arial, Helvetica, sans-serif;
    background: linear-gradient(120deg,#1f3c88,#4b6cb7);
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

.container{
    background:white;
    padding:35px;
    border-radius:10px;
    width:420px;
    box-shadow:0px 5px 25px rgba(0,0,0,0.3);
}

h2{
    text-align:center;
    margin-bottom:25px;
    color:#2c3e50;
}

label{
    font-weight:bold;
    display:block;
    margin-top:12px;
}

input, select, textarea{
    width:100%;
    padding:8px;
    margin-top:5px;
    border:1px solid #ccc;
    border-radius:5px;
    font-size:14px;
}

textarea{
    resize:none;
}

button{
    width:100%;
    margin-top:20px;
    padding:10px;
    background:#4b6cb7;
    border:none;
    color:white;
    font-size:16px;
    border-radius:5px;
    cursor:pointer;
}

button:hover{
    background:#2c4fa3;
}

.back{
    display:block;
    text-align:center;
    margin-top:15px;
    text-decoration:none;
    color:#4b6cb7;
    font-weight:bold;
}

.back:hover{
    text-decoration:underline;
}

</style>

</head>

<body>

<div class="container">

<h2>Apply Leave</h2>

<form action="apply_leave.php" method="POST">

<input type="hidden" name="name" value="<?php echo $name; ?>">

<label>Leave Type</label>
<select name="leave_type" required>
<option value="">Select Leave Type</option>
<option value="Sick Leave">Sick Leave</option>
<option value="Casual Leave">Casual Leave</option>
<option value="Paid leave">Paid leave</option>
</select>

<label>From Date</label>
<input type="date" name="from_date" required>

<label>To Date</label>
<input type="date" name="to_date" required>

<label>Reason</label>
<textarea name="reason" rows="3" required></textarea>

<button type="submit">Submit Leave Request</button>

</form>

<a class="back" href="dashboard.php">Back to Dashboard</a>

</div>

</body>
</html>