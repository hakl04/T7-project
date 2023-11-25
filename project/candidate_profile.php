<!DOCTYPE html>
<?php
include("candidate_account_check.php");
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
						<li><a href="candidate_dashboard.php">DASHBOARD</a></li>
						<li><a href="candidate_profile.php">PROFILE</a></li>
						<li><a href="searchjob.php">JOBS</a></li>
						<li><a href="about.php">ABOUT</a></li>
						<li><a href="candidate_logout.php">LOGOUT</a></li>
					</ul>	
				</div>
				<i class="fa fa-bars" onclick="openMenu()"></i>
			</nav>
			<h1>Candidate Profile</h1>
		</section>
        
        <section id="job-search">
            <h2>Your Profile:</h2>
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
                    <th class='result-th'>Candidate name</th>
                    <th class='result-th'>Email <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-envelope' viewBox='0 0 16 16'><path d='M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z'/></svg></th>
                    <th class='result-th'>Phone number</th>
                    <th class='result-th'>Resume link</th>
                    <th class='result-th'>Experience years</th>
                    <th class='result-th'>Education level</th>
                    <th class='result-th'>Specialization</th>
                </tr>
                <?php
                include("setting.php");
                $login_candidate = $_SESSION['candidate_id'];
                $query = "SELECT * FROM candidate WHERE id = '$login_candidate'";
                $rowlast = mysqli_query($conn,$query);
                $lastrow = mysqli_fetch_assoc($rowlast);
            	$name = $lastrow['name'];
            	$email = $lastrow['email'];
            	$phone = $lastrow['phone'];
            	$resume_link = $lastrow['resume_link'];
            	$experience_years = $lastrow['experience_years'];
            	$education_level = $lastrow['education_level'];
            	$specialization_name = $lastrow['specialization_name'];
				echo"
				<tr>
				<td class='result-td'>$name</td>
				<td class='result-td'>$email</td>
				<td class='result-td'>$phone</td>
				<td class='result-td'>$resume_link</td>
				<td class='result-td'>$experience_years</td>
				<td class='result-td'>$education_level</td>
				<td class='result-td'>$specialization_name</td>
				</tr>
				";
				?>
            </table>
            
        </section>
        <section id="job-search">
        <form action="candidate.php" method="POST">
			<?php
				echo"
                <input type='submit' value='Edit Profile'>
				 ";
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

