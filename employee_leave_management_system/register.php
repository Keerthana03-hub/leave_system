<?php
include "config.php";

if(isset($_POST['register'])){

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "INSERT INTO users (username,password,role)
VALUES ('$username','$password','employee')";

if($conn->query($sql)){
$message = "Registration Successful!";
}else{
$message = "Username already exists!";
}

}
?>
<link rel="stylesheet" href="style.css">

<div class="register-box">

<h2>Employee Registration</h2>
<?php
if(isset($message)){
echo "<p class='msg'>$message</p>";
}
?>

<form method="POST">

<input type="text" name="username" placeholder="Enter Username" required>

<input type="password" name="password" placeholder="Enter Password" required>

<button type="submit" name="register">Register</button>
<a href='index.php'>Login Now</a>
</form>

</div>

