<?php
session_start();
if(isset($_SESSION['candidate_id']) && $_SESSION['candidate_id'] != ""){
}
else{
    header("Location: candidate_login.php");
    exit();
}
?>