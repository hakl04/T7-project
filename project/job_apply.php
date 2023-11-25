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
$query = "SELECT * FROM candidate WHERE id='$candidate_id'";
    $rowlast = mysqli_query($conn,$query);
    $lastrow = mysqli_fetch_assoc($rowlast);
$specialization_name = $lastrow['specialization_name'];

$query = "SELECT * FROM job_application WHERE id=(SELECT MAX(id) FROM job_application)";
    $rowlast = mysqli_query($conn,$query);
    $lastrow = mysqli_fetch_assoc($rowlast);
    $newid = $lastrow['id'] + 1;
    $_SESSION['id'] = $newid;
    $query = "INSERT INTO job_application (job_posting_id,candidate_id, applied_date, interviewer_id, specialization_name, job_action) VALUES ('$job_id', '$candidate_id', now(), NULL,'$specialization_name','CONSIDERING')";
    mysqli_query($conn,$query);
    header("Location: candidate_dashboard.php");
?>