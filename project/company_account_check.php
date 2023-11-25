<?php
session_start();
if(isset($_SESSION["company_id"]) && $_SESSION['company_id'] != ""){
}
else{
    header("Location: company_login.php");
    exit();
}
?>