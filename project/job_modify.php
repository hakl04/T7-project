<!DOCTYPE html>
<?php
include("company_account_check.php");
if(isset($_POST['button'])){
	$job_id = $_POST['button'];
}
else{
	header("Location: company_dashboard.php");
}
?>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Swinburne University of Technology</title>
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
		<link rel="icon" href="images/logo.png">
    <!-- ICON -->
    <script src="https://kit.fontawesome.com/876c2d2ac2.js" crossorigin="anonymous"></script>
</head>
<body>
    <section class="sub-header">
        <nav>
            <a href="index.php"><img src="images/logo.png"></a>
            <div class="nav-links" id="navLinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
						<li><a href="index.php">HOME</a></li>
						<li><a href="company_dashboard.php">DASHBOARD</a></li>
						<li><a href="company_profile.php">PROFILE</a></li>
						<li><a href="job_posted.php">JOBS</a></li>
						<li><a href="about.php">ABOUT</a></li>
						<li><a href="company_logout.php">LOGOUT</a></li>
                </ul>	
            </div>
            <i class="fa fa-bars" onclick="openMenu()"></i>
        </nav>
        <h1>Job Modification</h1>
    </section>

    <section class="aform">
        <form action="process_job_modify.php" method="post">
            <fieldset>
            <?php
            include("setting.php");
            $query = "SELECT * FROM job_posting WHERE id = '$job_id'";
			$a_row = mysqli_query($conn,$query);
		    $row = mysqli_fetch_assoc($a_row);
            $job_title = $row['job_title'];
            $application_deadline = $row['application_deadline'];
            $salary = $row['salary'];
            $working_location = $row['working_location'];
            $scope_of_work = $row['scope_of_work'];
            $experience_requirement = $row['experience_requirement'];
            $benefits = $row['benefits'];
            $company_introduction = $row['company_introduction'];
            $specialization_name = $row['specialization_name'];
            echo"
            <div class='form-group'>
                <label for='job_title'>Job Title:</label>
                <input type='text' name='job_title' id='job_title' value='$job_title'>
            </div>
            ";
            if(isset($_SESSION['job_titleerror'])){
                echo $_SESSION['job_titleerror'];
            }
            echo"
            <div class='form-group'>
            <label for='application_deadline'>Application Deadline:</label>
            <input type='datetime-local' name='application_deadline' id='application_deadline' value='$application_deadline'>
            </div>
            ";
            if(isset($_SESSION['application_deadlineerror'])){
                echo $_SESSION['application_deadlineerror'];
            }
            echo"
            <div class='form-group'>
            <label for='salary'>Salary:</label>
            <input type='text' name='salary' id='salary' value='$salary'>
            </div>
            ";
            if(isset($_SESSION['salaryerror'])){
                echo $_SESSION['salaryerror'];
            }
            echo"
            <div class='form-group'>
            <label for='working_location'>Working Location:</label>
            <input type='text' name='working_location' id='working_location' value='$working_location'>
            </div>
            ";
            if(isset($_SESSION['working_locationerror'])){
                echo $_SESSION['working_locationerror'];
            }
            echo"
            <div class='form-group'>
            <label for='scope_of_work'>Scope of Work:</label>
            <textarea name='scope_of_work' id='scope_of_work' cols='30' rows='10'>$scope_of_work</textarea>
        </div>
            ";
            if(isset($_SESSION['scope_of_workerror'])){
                echo $_SESSION['scope_of_workerror'];
            }
            echo"
            <div class='form-group'>
            <label for='experience_requirement'>Experience Requirement:</label>
            <textarea name='experience_requirement' id='experience_requirement' cols='30' rows='10' >$experience_requirement</textarea>
            </div>
            ";
            if(isset($_SESSION['experience_requirementerror'])){
                echo $_SESSION['experience_requirementerror'];
            }
            echo"
            <div class='form-group'>
            <label for='benefits'>Benefits:</label>
            <textarea name='benefits' id='benefits' cols='30' rows='10'>$benefits</textarea>
            </div>
            ";
            if(isset($_SESSION['benefitserror'])){
                echo $_SESSION['benefitserror'];
            }
            echo"
            <div class='form-group'>
            <label for='company_introduction'>Company Introduction:</label>
            <textarea name='company_introduction' id='company_introduction' cols='30' rows='10' >$company_introduction</textarea>
            </div>
            ";
            if(isset($_SESSION['company_introductionerror'])){
                echo $_SESSION['company_introductionerror'];
            }
            echo"
             <div class='form-group'>
                 <label for='specialization_name'>Specialization:</label>
                 <select name='specialization_name'>
                 <option value=''>Select</option>";
                 
				include("setting.php");
				$conn = mysqli_connect ($host,$user,$pwd,$sql_db);
                $query = "SELECT * FROM job_specialization";
				$a_row = mysqli_query($conn,$query);
				$row = mysqli_fetch_assoc($a_row);
				while ($row) {
					$specialization = $row['specialization_name'];
					if($specialization == $specialization_name){
						echo"<option selected='selected' value='$specialization'>$specialization</option>";
					}
					else{
						echo"<option  value='$specialization'>$specialization</option>";
					}
					$row = mysqli_fetch_assoc($a_row);
					}
				echo"
                </select>
             </div>";
             if(isset($_SESSION['specialization_nameerror'])){
                echo $_SESSION['specialization_nameerror'];
            }
            echo"<input type='hidden' name='button' value=$job_id/>";
            ?>
            <div id="form-group-final">
                <input type="submit" value="Save" class="snr">
                <input type="reset" value="Reset Form" class="snr">
            </div>
           
            </fieldset>
        </form>
    </section>

    <section class="footer">
        <h4>Contact Us</h4>
        <div class="icons">
            <i class="fa fa-facebook"></i>
            <i class="fa fa-twitter"></i>
            <i class fa-instagram"></i>
            <i class="fa fa-linkedin"></i>
        </div>
        <p></p>
    </section>

    <!-- JavaScript for Menu -->
    <script type="text/javascript">
        var navLinks = document.getElementById("navLinks");
        function openMenu()
        {
            navLinks.style.right = "0";
        }
        function hideMenu()
        {
            navLinks.style.right = "-200px";
        }
    </script>
</body>
</html>
