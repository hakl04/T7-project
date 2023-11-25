<!DOCTYPE html>
<?php
include("company_account_check.php");
include("setting.php");
if(isset($_POST['button'])){
	$job_id = $_POST['button'];
}
else{
	header("Location: job_posted.php");
}
$query = "SELECT * FROM job_posting WHERE id = '$job_id'";
					$a_row = mysqli_query($conn,$query);
					$row = mysqli_fetch_assoc($a_row);
					$job_title =$row['job_title'];
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
						<li><a href="job_search_company.php">JOBS</a></li>
						<li><a href="about.php">ABOUT</a></li>
						<li><a href="company_logout.php">LOGOUT</a></li>
					</ul>	
				</div>
				<i class="fa fa-bars" onclick="openMenu()"></i>
			</nav>
			<h1>Candidates</h1>
		</section>
        
        <section id="job-search">
		<?php
		echo"
		<h2>Candidates for $job_title</h2>";
		?>
            <form action="search_application.php" method="POST">
			<?php
				 $condition = " ";
				 $name_condition = "";
				 $experience_years_condition = "";
				 $education_level_condition = "";
				 $specialization_name_condition = "";
				 if(isset($_POST['name']) && $_POST['name']){
					$name_condition = $_POST['name'];
					 if($condition){
						 $condition = $condition . " and ";
					 }
					 else{
						 $condition = $condition . " WHERE ";
					 }
					 $condition = $condition . "name LIKE '%{$name_condition}%'";
				 }
				 if(isset($_POST['experience_years']) && $_POST['experience_years']){
					$experience_years_condition = $_POST['experience_years'];
					 if($condition){
						 $condition = $condition . " and ";
					 }
					 else{
						 $condition = $condition . " WHERE ";
					 }
					 $condition = $condition . "experience_years >= $experience_years_condition";
				 }
				 if(isset($_POST['education_level']) && $_POST['education_level']){
					$education_level_condition = $_POST['education_level'];
					 if($education_level_condition != "all"){
						 if($condition){
							 $condition = $condition . " and ";
						 }
						 else{
							 $condition = $condition . " WHERE ";
						 }
						 $condition = $condition . "education_level = '$education_level_condition'";
					 }
				 }
				 if(isset($_POST['specialization_name']) && $_POST['specialization_name']){
					$specialization_name_condition = $_POST['specialization_name'];
					 if($specialization_name_condition != "all"){
						 if($condition){
							 $condition = $condition . " and ";
						 }
						 else{
							 $condition = $condition . " WHERE ";
						 }
						 $condition = $condition . "specialization_name = '$specialization_name_condition'";
					 }
				 }

				echo"
				 <input type='text' name='name' placeholder='Name' value= '$name_condition'>
				 <input type='number' name='experience_years' placeholder='Minimum Experience' value= '$experience_years_condition'>
                <select name='education_level',value= '$education_level_condition'>
				<option value='all'>All Levels</option>
				";
				if($education_level_condition == "PhD"){
					echo"<option selected='selected' value='PhD'>PhD  </option>";
				}
				else{
					echo"<option  value='PhD'>PhD</option>";
				}
				if($education_level_condition == "Bachelor"){
					echo"<option selected='selected' value='Bachelor'>Bachelor</option>";
				}
				else{
					echo"<option  value='Bachelor'>Bachelor</option>";
				}
				if($education_level_condition == "Master"){
					echo"<option selected='selected' value='Master'>Master</option>";
				}
				else{
					echo"<option  value='Master'>Master</option>";
				}
					
				echo"
                </select>";






				echo"
                <select name='specialization_name',value= '$education_level_condition'>
				<option value='all'>All Specialization</option>
				";
				$query = "SELECT * FROM job_specialization";
				$a_row = mysqli_query($conn,$query);
				$row = mysqli_fetch_assoc($a_row);
				while ($row) {
					$specialization_name = $row['specialization_name'];
					if($specialization_name_condition == $specialization_name){
						echo"<option selected='selected' value='$specialization_name'>$specialization_name</option>";
					}
					else{
						echo"<option  value='$specialization_name'>$specialization_name</option>";
					}
					$row = mysqli_fetch_assoc($a_row);
					}
				echo"
                </select>
				<input type='hidden' name='button' value='$job_id'/>
                <input type='submit' value='Search'>";
			?>
                
            </form>
        </section>
        
        <section id="job-results">
            <h2>Results</h2>
            <!-- Display search results here -->
			<div class="job-card-container">
				<?php
					
					$query = "SELECT * FROM job_application WHERE job_posting_id = '$job_id'";
					$a_row = mysqli_query($conn,$query);
					$row = mysqli_fetch_assoc($a_row);
					$hasrow = false;
					while ($row) {
						$application_id = $row['id'];
						$candidate_id =  $row['candidate_id'];
						$query2 = "SELECT * FROM candidate WHERE id = '$candidate_id' $condition";
						$a_row2 = mysqli_query($conn,$query2);
						$row2 = mysqli_fetch_assoc($a_row2);
						if($row2){
							$hasrow = true;
							$name = substr($row2['name'],0,30);
							$email = substr($row2['email'],0,20);
							$phone = $row2['phone'];
							$experience_years = $row2['experience_years'];
							$education_level = $row2['education_level'];
							$specialization_name = $row2['specialization_name'];
							echo"
							<div class='job-card'>
								<form id='myform' method='Post'></form>
								<h3> $name </h3>
								<div class='details-container'>
									<button name='button' value='$application_id' formaction='view_candidate.php' form='myform'>View</button>
									<div>
										<p>Email:$email</p>
										<p>Phone Number: $phone</p>
										<p>Experience Years: $experience_years</p>
										<p>Education Level: $education_level</p>
										<p>Category: $specialization_name</p>
									</div>
								</div>
							</div>
							";
						}
						$row = mysqli_fetch_assoc($a_row);
						}
				?>
			</div>
            
            <!-- Repeat the job cards for more results -->
        </section>

		<?php
			if(!$hasrow){
				
				echo"
				<section id='job-results'>
				<p>No candidate has applied for this job</p>
				</section>";
			}
		?>

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
