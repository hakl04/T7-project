<?php
$login_company = $_POST['name'];
$password = $_POST['password'];
include("setting.php");
session_start();
include("createdatabase.php");
$query = "SELECT * FROM company WHERE name = '$login_company' and password='$password'";
$rowlast = mysqli_query($conn,$query);
$lastrow = mysqli_fetch_assoc($rowlast);
if($lastrow){
    $_SESSION['company_id'] = $lastrow['id'];
    header("Location: company_dashboard.php");
}
else{
    $_SESSION['company_login_error'] = "<p class='error'>Incorrect name or password</p>";
    header("Location: company_login.php");
}
?>