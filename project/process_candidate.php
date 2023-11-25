<?php
include("setting.php");
session_start();
$_SESSION["error"] = false;
$name = $_POST["name"];
$_SESSION["name"] = $name;

$email = trim($_POST["email"],"\ ");
$_SESSION["email"] = $email;

$phone = $_POST["phone"];
$_SESSION["phone"] = $phone;

$resume_link = trim($_POST["resume_link"],"\ ");
$_SESSION["resume_link"] = $resume_link;

$experience_years = $_POST["experience_years"];
$_SESSION["experience_years"] = $experience_years;

$education_level = $_POST["education_level"];
$_SESSION["education_level"] = $education_level;

$specialization_name = $_POST["specialization_name"];
$_SESSION["specialization_name"] = $specialization_name;

$_SESSION["nameerror"] = "";
$_SESSION["emailerror"] = "";
$_SESSION["phoneerror"] = "";
$_SESSION["resume_linkerror"] = "";
$_SESSION["experience_yearserror"] = "";
$_SESSION["education_levelerror"] = "";
$_SESSION["specialization_nameerror"] = "";
if($name == ""){
    $_SESSION["nameerror"] = $_SESSION["nameerror"] . "<p class='error'>You need to fill in the name</p>";
    $_SESSION["error"] = true;
}
if($email == ""){
    $_SESSION["emailerror"] = $_SESSION["emailerror"] . "<p class='error'>You need to fill in the email</p>";
    $_SESSION["error"] = true;
}
if($phone == ""){
    $_SESSION["phoneerror"] = $_SESSION["phoneerror"] . "<p class='error'>You need to fill in phonenumber</p>";
    $_SESSION["error"] = true;
}
if(strlen($phone) > 10){
    $_SESSION["phoneerror"] = $_SESSION["phoneerror"] . "<p class='error'>Phone number must contain maximum of 10 digits</p>";
    $_SESSION["error"] = true;
}
if($resume_link == ""){
    $_SESSION["resume_linkerror"] = $_SESSION["resume_linkerror"] . "<p class='error'>You need to fill in the resume link</p>";
    $_SESSION["error"] = true;
}
if($experience_years == ""){
    $_SESSION["experience_yearserror"] = $_SESSION["experience_yearserror"] . "<p class='error'>You need to fill in the experience year</p>";
    $_SESSION["error"] = true;
}
if($education_level == ""){
    $_SESSION["education_levelerror"] = $_SESSION["education_levelerror"] . "<p class='error'>You need to select the education level</p>";
    $_SESSION["error"] = true;
}
if($specialization_name == ""){
    $_SESSION["specialization_nameserror"] = $_SESSION["specialization_nameserror"] . "<p class='error'>You need to select a specialization</p>";
    $_SESSION["error"] = true;
}
if($_SESSION["error"] == true){
    header("Location: candidate.php");
}
else{
    $query = "SELECT * FROM candidate WHERE id=(SELECT MAX(id) FROM candidate)";
    $rowlast = mysqli_query($conn,$query);
    $lastrow = mysqli_fetch_assoc($rowlast);
    $newid = $lastrow['id'] + 1;
    $_SESSION['id'] = $newid;
    $candidate_id = $_SESSION['candidate_id'];
    $query = "UPDATE candidate  SET name='$name', email='$email', phone='$phone', resume_link='$resume_link',experience_years='$experience_years',education_level='$education_level',specialization_name='$specialization_name' WHERE id = $candidate_id";
    mysqli_query($conn,$query);
    header("Location: candidate_profile.php");
}

?>