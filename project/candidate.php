<!DOCTYPE html>
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
						<li><a href="candidate_dashboard.php">DASHBOARD</a></li>
						<li><a href="candidate_profile.php">PROFILE</a></li>
						<li><a href="searchjob.php">JOBS</a></li>
						<li><a href="about.php">ABOUT</a></li>
						<li><a href="candidate_logout.php">LOGOUT</a></li>
                </ul>	
            </div>
            <i class="fa fa-bars" onclick="openMenu()"></i>
        </nav>
        <h1>Candidate</h1>
    </section>

    <section class="aform">
        <form action="process_candidate.php" method="post">
            <fieldset>
            <?php
            include("setting.php");
            session_start();
            $id = $_SESSION['candidate_id'];
            $query = "SELECT * FROM candidate WHERE id = $id";
			$a_row = mysqli_query($conn,$query);
		    $row = mysqli_fetch_assoc($a_row);
            $name = $row['name'];
            $email = $row['email'];
            $phone = $row['phone'];
            $resume_link = $row['resume_link'];
            $education_level = $row['education_level'];
            $experience_years = $row['experience_years'];
            $specialization_name = $row['specialization_name'];
            if(isset($_SESSION['name'])){
                $name = $_SESSION['name'];
                $_SESSION['name'] = $row['name'];
            }
            if(isset($_SESSION['email'])){
                $email = $_SESSION['email'];
                $_SESSION['email'] = $row['email'];
            }
            if(isset($_SESSION['phone'])){
                $phone = $_SESSION['phone'];
                $_SESSION['phone'] = $row['phone'];
            }
            if(isset($_SESSION['resume_link'])){
                $resume_link = $_SESSION['resume_link'];
                $_SESSION['resume_link'] = $row['resume_link'];
            }
            if(isset($_SESSION['education_level'])){
                $education_level = $_SESSION['education_level'];
                $_SESSION['education_level'] = $row['education_level'];
            }
            if(isset($_SESSION['experience_years'])){
                $experience_years = $_SESSION['experience_years'];
                $_SESSION['experience_years'] = $row['experience_years'];
            }
            if(isset($_SESSION['specialization_name'])){
                $specialization_name = $_SESSION['specialization_name'];
                $_SESSION['specialization_name'] = $row['specialization_name'];
            }
            echo"
            <div class='form-group'>
                <label for='name'>Candidate Name:</label>
                <input type='text' name='name' id='candidate_name' value='$name'>
            </div>";
            if(isset($_SESSION['nameerror'])){
                echo $_SESSION['nameerror'];
                $_SESSION['nameerror'] = "";
            }
            echo"
            <div class='form-group'>
                <label for='email'>Email:</label>
                <input type='email' name='email' id='email' value='$email'>
            </div>";
            if(isset($_SESSION['emailerror'])){
                echo $_SESSION['emailerror'];
                $_SESSION['emailerror'] = "";
            }
            echo"
            <div class='form-group'>
                <label for='phone'>Phone number:</label>
                <input type='number' name='phone' id='phone' value='$phone'>
            </div>";
            if(isset($_SESSION['phoneerror'])){
                echo $_SESSION['phoneerror'];
                $_SESSION['phoneerror'] = "";
            }
            echo"
            <div class='form-group'>
                <label for='resume_link'>Resume link:</label>
                <input type='url' name='resume_link' id='resume_link' value='$resume_link'>
            </div>";
            if(isset($_SESSION['resume_linkerror'])){
                echo $_SESSION['resume_linkerror'];
                $_SESSION['resume_linkerror'] = "";
            }
            echo"
            <div class='form-group'>
                <label for='experience_years'>Experience years:</label>
                <input type='number' name='experience_years' id='experience_years' value='$experience_years'>
            </div>";
            if(isset($_SESSION['experience_yearserror'])){
                echo $_SESSION['experience_yearserror'];
                $_SESSION['experience_yearserror'] = "";
            }
            echo"
            <div class='form-group'>
                <label for='education_level'>Education level:</label>
                <select name='education_level'>
				<option value=''>Select</option>";
                if($education_level == 'PhD'){
                    echo"<option selected='selected' value='PhD'>PhD</option>";
                }
                else{
                    echo"<option  value='PhD'>PhD</option>";
                }
                if($education_level == 'Bachelor'){
                    echo"<option selected='selected' value='Bachelor'>Bachelor</option>";
                }
                else{
                    echo"<option  value='Bachelor'>Bachelor</option>";
                }
                if($education_level == 'Master'){
                    echo"<option selected='selected' value='Master'>Master</option>";
                }
                else{
                    echo"<option  value='Master'>Master</option>";
                }
                echo"
                </select>
            </div>";
            if(isset($_SESSION['education_levelerror'])){
                echo $_SESSION['education_levelerror'];
                $_SESSION['education_levelerror'] = "";
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
                $_SESSION['specialization_nameerror'] = "";
            }
            ?>
            
            <div id="form-group-final">
                <input type="submit" value="Save" class="snr">
                <input type="reset" value="Reset form" class="snr">
            </div>
            </fieldset>
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