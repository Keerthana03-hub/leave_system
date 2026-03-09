<?php 
session_start();
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

$sql = "SELECT * FROM users WHERE username='$username' AND role='$role'";
$result = $conn->query($sql);

if($result->num_rows > 0){

$row = $result->fetch_assoc();

if($password == $row['password']){

if($role == "admin"){
$_SESSION['admin'] = $username;
header("Location: admin.php");
exit();
}

if($role == "employee"){
$_SESSION['employee'] = $username;
header("Location: dashboard.php");
exit();
}

}else{
$error = "Invalid Password!";
}

}else{
$error = "User not found!";
}

}
?>