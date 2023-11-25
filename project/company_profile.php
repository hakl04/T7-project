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
			<h1>Company Profile</h1>
		</section>
        
        <section id="job-search">
            <h2>Company Profile:</h2>
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
                    <th class='result-th'>Company name</th>
                    <th class='result-th'>Size</th>
                    <th class='result-th'>Introduction</th>
                    <th class='result-th'>Phone</th>
                    <th class='result-th'>Email</th>
                    <th class='result-th'>Address</th>
                </tr>
                <?php
                include("setting.php");
                $login_company = $_SESSION['company_id'];
                $query = "SELECT * FROM company WHERE id = '$login_company'";
                $rowlast = mysqli_query($conn,$query);
                $lastrow = mysqli_fetch_assoc($rowlast);
            	$name = $lastrow['name'];
            	$size = $lastrow['size'];
            	$introduction = $lastrow['introduction'];
            	$phone = $lastrow['phone'];
            	$email = $lastrow['email'];
            	$address = $lastrow['address'];
				echo"
				<tr>
				<td class='result-td'>$name</td>
				<td class='result-td'>$size</td>
				<td class='result-td'>$introduction</td>
				<td class='result-td'>$phone</td>
				<td class='result-td'>$email</td>
				<td class='result-td'>$address</td>
				</tr>
				";
				?>
            </table>
        </section>
        
        </section>
        <section id="job-search">
        <form action="company.php" method="POST">
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
