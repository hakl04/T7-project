<?php
include("setting.php");
$application_id = $_POST['button'];
$query = "UPDATE job_application  SET job_action='YES' WHERE id = '$application_id'";
    mysqli_query($conn,$query);
    header("Location: company_dashboard.php");
?>