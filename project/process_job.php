<?php
include("setting.php");
session_start();
$company_id = $_SESSION["company_id"];
$_SESSION["error"] = false;
$job_title = $_POST["job_title"];
$_SESSION["job_title"] = $job_title;

$application_deadline = trim($_POST["application_deadline"],"\ ");
$_SESSION["application_deadline"] = $application_deadline;

$salary = $_POST["salary"];
$_SESSION["salary"] = $salary;

$working_location = trim($_POST["working_location"],"\ ");
$_SESSION["working_location"] = $working_location;

$scope_of_work = $_POST["scope_of_work"];
$_SESSION["scope_of_work"] = $scope_of_work;

$experience_requirement = $_POST["experience_requirement"];
$_SESSION["experience_requirement"] = $experience_requirement;

$benefits = $_POST["benefits"];
$_SESSION["benefits"] = $benefits;

$company_introduction = $_POST["company_introduction"];
$_SESSION["company_introduction"] = $company_introduction;

$specialization_name = $_POST["specialization_name"];
$_SESSION["specialization_name_job"] = $specialization_name;

$_SESSION["job_titleerror"] = "";
$_SESSION["application_deadlineerror"] = "";
$_SESSION["salaryerror"] = "";
$_SESSION["working_locationerror"] = "";
$_SESSION["scope_of_workerror"] = "";
$_SESSION["experience_requirementerror"] = "";
$_SESSION["benefitserror"] = "";
$_SESSION["company_introductionerror"] = "";
$_SESSION["specialization_nameerror"] = "";
if($job_title == ""){
    $_SESSION["job_titleerror"] = $_SESSION["job_titleerror"] . "<p class='error'>You need to fill in the title</p>";
    $_SESSION["error"] = true;
}
if($application_deadline == ""){
    $_SESSION["application_deadlineerror"] = $_SESSION["application_deadlineerror"] . "<p class='error'>You need to fill in the application deadline</p>";
    $_SESSION["error"] = true;
}
if($salary == ""){
    $_SESSION["salaryerror"] = $_SESSION["salaryerror"] . "<p class='error'>You need to fill in salary</p>";
    $_SESSION["error"] = true;
}
if($working_location == ""){
    $_SESSION["working_locationerror"] = $_SESSION["working_locationerror"] . "<p class='error'>You need to fill in the working location</p>";
    $_SESSION["error"] = true;
}
if($scope_of_work == ""){
    $_SESSION["scope_of_workerror"] = $_SESSION["scope_of_workerror"] . "<p class='error'>You need to fill in the scope of work</p>";
    $_SESSION["error"] = true;
}
if($experience_requirement == ""){
    $_SESSION["experience_requirementerror"] = $_SESSION["experience_requirementerror"] . "<p class='error'>You need to fill in the experience requirement</p>";
    $_SESSION["error"] = true;
}
if($benefits == ""){
    $_SESSION["benefitserror"] = $_SESSION["benefitserror"] . "<p class='error'>You need to select the benefits</p>";
    $_SESSION["error"] = true;
}
if($company_introduction == ""){
    $_SESSION["company_introductionerror"] = $_SESSION["company_introductionerror"] . "<p class='error'>You need to fill in the introduction</p>";
    $_SESSION["error"] = true;
}
if($specialization_name == ""){
    $_SESSION["specialization_nameerror"] = $_SESSION["specialization_nameerror"] . "<p class='error'>You need to select a specialization</p>";
    $_SESSION["error"] = true;
}
if($_SESSION["error"] == true){
    header("Location: jobpost.php");
}
else{
    $query = "SELECT * FROM job_posting WHERE id=(SELECT MAX(id) FROM job_posting)";
    $rowlast = mysqli_query($conn,$query);
    $lastrow = mysqli_fetch_assoc($rowlast);
    $newid = $lastrow['id'] + 1;
    $_SESSION['id'] = $newid;
    $query = "INSERT INTO job_posting (company_id,job_title, application_deadline, salary, working_location, scope_of_work, experience_requirement,benefits,company_introduction,specialization_name) VALUES ('$company_id','$job_title', '$application_deadline', '$salary', '$working_location','$scope_of_work','$experience_requirement','$benefits','$company_introduction','$specialization_name')";
    mysqli_query($conn,$query);
    header("Location: company_dashboard.php");
}

?>