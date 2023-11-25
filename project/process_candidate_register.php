<?php
$login_candidate = $_POST['name'];
$password = $_POST['password'];
include("setting.php");
session_start();
$query = "SELECT * FROM candidate WHERE name = '$login_candidate'";
$rowlast = mysqli_query($conn,$query);
$lastrow = mysqli_fetch_assoc($rowlast);
if($lastrow){
    $_SESSION['candidate_login_error'] = "<p class='error'>Candidate name already taken</p>";
    header("Location: candidate_login.php");
}
else{
    $query = "INSERT INTO candidate (name, email, phone,resume_link,experience_years,education_level,specialization_name,password) VALUES ('$login_candidate', '', '','','','PhD','Data Analyst','$password')";
    mysqli_query($conn,$query);
    $query = "SELECT * FROM candidate WHERE id=(SELECT MAX(id) FROM candidate)";
    $rowlast = mysqli_query($conn,$query);
    $lastrow = mysqli_fetch_assoc($rowlast);
    $_SESSION['candidate_id'] = $lastrow['id'];
    header("Location: candidate_dashboard.php");
}
?>