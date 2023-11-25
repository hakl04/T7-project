<?php
include("setting.php");
session_start();
$_SESSION["error"] = false;
$name = $_POST["name"];
$_SESSION["name2"] = $name;

$email = $_POST["email"];
$_SESSION["email2"] = $email;

$phone = $_POST["phone"];
$_SESSION["phone2"] = $phone;

$introduction = $_POST["introduction"];
$_SESSION["introduction"] = $introduction;

$size = $_POST["size"];
$_SESSION["size"] = $size;

$address = $_POST["address"];
$_SESSION["address"] = $address;

$_SESSION["nameerror"] = "";
$_SESSION["emailerror"] = "";
$_SESSION["phoneerror"] = "";
$_SESSION["introductionerror"] = "";
$_SESSION["sizeerror"] = "";
$_SESSION["addresserror"] = "";
if($name == ""){
    $_SESSION["nameerror"] = $_SESSION["nameerror"] . "<p class='error'>You need to fill in the company name</p>";
    $_SESSION["error"] = true;
}
if($email == ""){
    $_SESSION["emailerror"] = $_SESSION["emailerror"] . "<p class='error'>You need to fill in the company email</p>";
    $_SESSION["error"] = true;
}
if($phone == ""){
    $_SESSION["phoneerror"] = $_SESSION["phoneerror"] . "<p class='error'>You need to fill in the company phonenumber</p>";
    $_SESSION["error"] = true;
}
if(strlen($phone) > 10){
    $_SESSION["phoneerror"] = $_SESSION["phoneerror"] . "<p class='error'>Phone number must contain maximum of 10 digits</p>";
    $_SESSION["error"] = true;
}
if($introduction == ""){
    $_SESSION["introductionerror"] = $_SESSION["introductionerror"] . "<p class='error'>You need to fill in the company introduction</p>";
    $_SESSION["error"] = true;
}
if($size == ""){
    $_SESSION["sizeerror"] = $_SESSION["sizeerror"] . "<p class='error'>You need to fill in the company size</p>";
    $_SESSION["error"] = true;
}
if($address == ""){
    $_SESSION["addresserror"] = $_SESSION["addresserror"] . "<p class='error'>You need to fill in the company address</p>";
    $_SESSION["error"] = true;
}
if($_SESSION["error"] == true){
    header("Location: company.php");
}
else{
    $query = "SELECT * FROM company WHERE id=(SELECT MAX(id) FROM candidate)";
    $rowlast = mysqli_query($conn,$query);
    $lastrow = mysqli_fetch_assoc($rowlast);
    $newid = $lastrow['id'] + 1;
    $_SESSION['id'] = $newid;
    $company_id = $_SESSION['company_id'];
    $query = "UPDATE company  SET name='$name', email='$email', phone='$phone', introduction='$introduction',size='$size',address='$address' WHERE id = $company_id";
    mysqli_query($conn,$query);
    header("Location: company_profile.php");
}

?>