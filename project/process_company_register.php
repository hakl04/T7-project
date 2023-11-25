<?php
$login_company = $_POST['name'];
$password = $_POST['password'];
include("setting.php");
session_start();
include("createdatabase.php");
$query = "SELECT * FROM company WHERE name = '$login_company'";
$rowlast = mysqli_query($conn,$query);
$lastrow = mysqli_fetch_assoc($rowlast);
if($lastrow){
    $_SESSION['company_login_error'] = "<p class='error'>Company name already taken</p>";
    header("Location: company_login.php");
}
else{
    $query = "INSERT INTO company (name, size, introduction,phone,email,address,password) VALUES ('$login_company', '', '','','','','$password')";
    mysqli_query($conn,$query);
    $query = "SELECT * FROM company WHERE id=(SELECT MAX(id) FROM company)";
    $rowlast = mysqli_query($conn,$query);
    $lastrow = mysqli_fetch_assoc($rowlast);
    $_SESSION['company_id'] = $lastrow['id'];
    header("Location: company_dashboard.php");
}
?>