<?php
$login_candidate = $_POST['name'];
$password = $_POST['password'];
include("setting.php");
session_start();
$query = "SELECT * FROM candidate WHERE name = '$login_candidate' and password='$password'";
$rowlast = mysqli_query($conn,$query);
$lastrow = mysqli_fetch_assoc($rowlast);
if($lastrow){
    $_SESSION['candidate_id'] = $lastrow['id'];
    header("Location: candidate_dashboard.php");
}
else{
    $_SESSION['candidate_login_error'] = "<p class='error'>Incorrect name or password</p>";
    header("Location: candidate_login.php");
}
?>