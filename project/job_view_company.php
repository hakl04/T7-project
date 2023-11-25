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
<html>
	<head>
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Swinburne University of Technology</title>
		<link rel="stylesheet" type="text/css" href="styles/styles.css">
		<!-- FONT -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
		<!-- ICON -->
		<script src="https://kit.fontawesome.com/876c2d2ac2.js" crossorigin="anonymous"></script>
		
	</head>

    <body>
		<section class="sub-header">
			<nav>
				<a href="index.html"><img src="images/logo.png"></a>
				<div class="nav-links" id="navLinks">
					<i class="fa fa-times" onclick="hideMenu()"></i>
					<ul>
						<li><a href="index.php">HOME</a></li>
						<li><a href="company_dashboard.php">DASHBOARD</a></li>
						<li><a href="company_profile.php">PROFILE</a></li>
						<li><a href="job_search_company.php">JOBS</a></li>
						<li><a href="about.php">ABOUT</a></li>
						<li><a href="company_logout.php">LOGOUT</a></li>
					</ul>	
				</div>
				<i class="fa fa-bars" onclick="openMenu()"></i>
			</nav>
			<h1>Job Details</h1>
		</section>
        
        <section id="cnj-result">
            <table class='result-table'>
                <colgroup class='candidate-col-widths'>
                    <col>
                    <col>
                    <col>
                    <col>
                    <col>
                    <col>
                </colgroup>
                <tr>
                    <th class='result-th'>Job Title</th>
                    <th class='result-th'>Application Deadline</th>
                    <th class='result-th'>Salary</th>
                    <th class='result-th'>Working Location</th>
                    <th class='result-th'>Scope</th>
                    <th class='result-th'>Experience Requirement</th>
                    <th class='result-th'>Benefits</th>
                    <th class='result-th'>Introduction</th>
                    <th class='result-th'>Specialization</th>
                </tr>
                <?php
                include("setting.php");
                $candidate_id = $_SESSION['candidate_id'];
                $query = "SELECT * FROM job_posting WHERE id = '$job_id'";
                $rowlast = mysqli_query($conn,$query);
                $lastrow = mysqli_fetch_assoc($rowlast);
            	$job_title = $lastrow['job_title'];
            $application_deadline = $lastrow['application_deadline'];
            $salary = $lastrow['salary'];
            $working_location = $lastrow['working_location'];
            $scope_of_work = $lastrow['scope_of_work'];
            $experience_requirement = $lastrow['experience_requirement'];
            $benefits = $lastrow['benefits'];
            $company_introduction = $lastrow['company_introduction'];
            $specialization_name = $lastrow['specialization_name'];
				echo"
				<tr>
				<td class='result-td'>$job_title</td>
				<td class='result-td'>$application_deadline</td>
				<td class='result-td'>$salary</td>
				<td class='result-td'>$working_location</td>
				<td class='result-td'>$scope_of_work</td>
				<td class='result-td'>$experience_requirement</td>
				<td class='result-td'>$benefits</td>
				<td class='result-td'>$company_introduction</td>
				<td class='result-td'>$specialization_name</td>
				</tr>
				";
				?>
            </table>
            
        
        <section id="job-search">
        <form action="" method="POST">
			<?php
            echo"<input type='hidden' name='button' value=$job_id/>";
            echo"
                    <input type='submit' formaction='job_modify.php'  value='Modify'>
                    <input type='submit' formaction='search_application.php'  value='View Candidates'>";
			?>
                
            </form>
        </section>

		<section class="footer">
			<h4>Contact us</h4>
			<div class="icons">
				<i class="fa fa-facebook"></i>
				<i class="fa fa-twitter"></i>
				<i class="fa fa-instagram"></i>
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

