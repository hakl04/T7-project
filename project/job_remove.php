<?php
include("candidate_account_check.php");
include("setting.php");
if(isset($_POST['button'])){
    $job_id = $_POST['button'];
}
else{
    header("Location: searchjob.php");
}
$candidate_id = $_SESSION['candidate_id'];
    $query = "DELETE FROM job_application WHERE job_posting_id = '$job_id' and candidate_id = '$candidate_id'";
        mysqli_query($conn,$query);
    header("Location: candidate_dashboard.php");
?>