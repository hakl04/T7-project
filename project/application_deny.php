<?php
include("setting.php");
$application_id = $_POST['button'];
include("createdatabase.php");
$query = "UPDATE job_application  SET job_action='NO' WHERE id = '$application_id'";
    mysqli_query($conn,$query);
    header("Location: company_dashboard.php");
?>