<!DOCTYPE html>
<?php
include("company_account_check.php");
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
			<h1>Jobs Search</h1>
		</section>
        
        <section id="job-search">
            <h2>Jobs From Other Companies</h2>
            <form action="job_search_company.php" method="POST">
			<?php
					include("setting.php");
					$company_id = $_SESSION['company_id'];
				 $condition = "WHERE company_id != $company_id";
				 $keyword_condition = "";
				 $working_location_condition = "";
				 $specialization_name_condition = "";
				 if(isset($_POST['keywords']) && $_POST['keywords']){
					$keyword_condition = $_POST['keywords'];
					 if($condition){
						 $condition = $condition . " and ";
					 }
					 else{
						 $condition = $condition . " WHERE ";
					 }
					 $query2 = "SELECT * FROM company WHERE name LIKE '%{$keyword_condition}%'";
						$a_row2 = mysqli_query($conn,$query2);
						$row2 = mysqli_fetch_assoc($a_row2);
						if($row2){
							$company_id = $row2['id'];
							$condition = $condition . "(job_title LIKE '%{$keyword_condition}%'";
							$condition = $condition . "or company_id = $company_id)";
						}
						else{
							$condition = $condition . "job_title LIKE '%{$keyword_condition}%'";
						}
				 }
				 if(isset($_POST['location']) && $_POST['location']){
					$working_location_condition = $_POST['location'];
					 if($condition){
						 $condition = $condition . " and ";
					 }
					 else{
						 $condition = $condition . " WHERE ";
					 }
					 $condition = $condition . "working_location LIKE '%{$working_location_condition}%'";
				 }
				 if(isset($_POST['category']) && $_POST['category']){
					$specialization_name_condition = $_POST['category'];
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
				 <input type='text' name='keywords' placeholder='Keywords' value= '$keyword_condition'>
                <input type='text' name='location' placeholder='Location' value= '$working_location_condition'>
                <select name='category',value= '$specialization_name_condition'>
				<option value='all'>All Categories</option>
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
                <input type='submit' value='Search'>
                <input type='submit' formaction='jobpost.php' value='Create New +'>
				 
				 ";
			?>
                
            </form>
        </section>
        
        <section id="job-results">
            <h2>Job Results</h2>
            <!-- Display search results here -->
			<div class="job-card-container">
				<?php
					$query = "SELECT * FROM job_posting $condition";
					$a_row = mysqli_query($conn,$query);
					$row = mysqli_fetch_assoc($a_row);
					$hasrow = false;
					while ($row) {
						$hasrow = true;
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
						echo"
						<div class='job-card'>
							<form id='myform' method='Post'></form>
							<h3> $job_title </h3>
							<div class='details-container'>
							<button name='button' value='$job_id' form='myform' formaction='job_view_other_company.php'>View</button>
							<div>
									<p>$company_name</p>
									<p>Location: $working_location</p>
									<p>Category: $specialization_name</p>
									<p>Description: $company_introduction</p>
								</div>
							</div>
						</div>
						";
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
				<p>No job found</p>
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



