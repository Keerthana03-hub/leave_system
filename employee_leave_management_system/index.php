<?php 
session_start();
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

$sql = "SELECT * FROM users WHERE username='$username' AND password='$password' AND role='$role'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

$row = $result->fetch_assoc();

if($role == "admin"){
$_SESSION['admin'] = $row['username'];
header("Location: admin.php");
exit();
}

if($role == "employee"){
$_SESSION['employee'] = $row['username'];
header("Location: dashboard.php");
exit();
}

} else {

$error = "Invalid Login Credentials!";

}

}
?>
<!DOCTYPE html>
<html>
<head>
<title>Employee Leave System</title>
<link rel="stylesheet" href="style.css">
</head>
<body class="login-page">

<div class="login-wrapper">
<div class="login-card">

<h2>Employee Leave Management</h2>
<?php
if(isset($error)){
    echo "<p style='color:red;text-align:center;'>$error</p>";
}
?>

<form method="POST">

    <input type="text" name="username" placeholder="Username" required>

    <input type="password" name="password" placeholder="Password" required>

    <select name="role" required>
        <option value="">Select Role</option>
        <option value="employee">Employee</option>
        <option value="admin">Admin</option>
    </select>

    <button type="submit">Login</button>
    <p style="text-align:center;">
New Employee? <a href="register.php">Register Here</a>
</p>

</form>

</div>
</div>

</body>
</html>
