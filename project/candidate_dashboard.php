<!DOCTYPE html>
<?php
include("candidate_account_check.php");
include("setting.php");
include("createdatabase.php");
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
						<li><a href="candidate_dashboard.php">DASHBOARD</a></li>
						<li><a href="candidate_profile.php">PROFILE</a></li>
						<li><a href="searchjob.php">JOBS</a></li>
						<li><a href="about.php">ABOUT</a></li>
						<li><a href="candidate_logout.php">LOGOUT</a></li>
					</ul>	
				</div>
				<i class="fa fa-bars" onclick="openMenu()"></i>
			</nav>
			<h1>Candidate Dashboard</h1>
		</section>
        
        
		<section id="job-results">
            <h2>Applied Jobs</h2>
            <!-- Display search results here -->
			<div class="job-card-container">
				<?php
					$candidate_id = $_SESSION['candidate_id'];
					$query = "SELECT * FROM job_posting";
					$a_row = mysqli_query($conn,$query);
					$row = mysqli_fetch_assoc($a_row);
					$hasrow = false;
					while ($row) {
						$job_id = $row['id'];
						$company_id = $row['company_id'];
						$job_title = substr($row['job_title'],0,30);
						$company_id = $row['company_id'];
						$working_location = substr($row['working_location'],0,20);
						$specialization_name = $row['specialization_name'];
						$company_introduction = substr($row['company_introduction'],0,20);

						$query2 = "SELECT * FROM company WHERE id = $company_id";
						$a_row2 = mysqli_query($conn,$query2);
						$row2 = mysqli_fetch_assoc($a_row2);
						$company_name = substr($row2['name'],0,20);
						$query3 = "SELECT * FROM job_application WHERE job_posting_id = $job_id and candidate_id = $candidate_id";
							$a_row3 = mysqli_query($conn,$query3);
							$row3 = mysqli_fetch_assoc($a_row3);

							
							if($row3){
								$hasrow = true;
								$state = $row3['job_action'];
								echo"
						<div class='job-card'>
							<form id='myform' method='Post'></form>
							<h3> $job_title </h3>
							<div class='details-container'>";
								echo"
								<button name='button' value='$job_id' form='myform' formaction='job_view.php'>View</button>";
								echo"<div>
									<p>$company_name</p>
									<p>Location: $working_location</p>
									<p>Category: $specialization_name</p>
									<p>Description: $company_introduction</p>
									<p class='$state'>$state</p>
								</div>
							</div>
						</div>
						";
							}
							
						$row = mysqli_fetch_assoc($a_row);
						}
						
				?>
			</div>
            <?php
			if(!$hasrow){
				
				echo"
				<section id='job-results'>
				<p>You have not applied for any job</p>
				</section>";
			}
			?>
            <!-- Repeat the job cards for more results -->
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

