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
						<li><a href="company_dashboard.php">DASHBOARD</a></li>
						<li><a href="company_profile.php">PROFILE</a></li>
						<li><a href="job_search_company.php">JOBS</a></li>
						<li><a href="about.php">ABOUT</a></li>
						<li><a href="company_logout.php">LOGOUT</a></li>
                </ul>	
            </div>
            <i class="fa fa-bars" onclick="openMenu()"></i>
        </nav>
        <h1>Company</h1>
    </section>

    <section class="aform">
        <form action="process_company.php" method="post">
            <fieldset>
            <?php
            include("setting.php");
            session_start();
            $id = $_SESSION['company_id'];
            $query = "SELECT * FROM company WHERE id = $id";
			$a_row = mysqli_query($conn,$query);
		    $row = mysqli_fetch_assoc($a_row);
            $name = $row['name'];
            $email = $row['email'];
            $phone = $row['phone'];
            $size = $row['size'];
            $introduction = $row['introduction'];
            $address = $row['address'];
            if(isset($_SESSION['name2'])){
                $name = $_SESSION['name2'];
                $_SESSION['name2'] = $row['name'];
            }
            if(isset($_SESSION['email2'])){
                $email = $_SESSION['email2'];
                $_SESSION['email2'] = $row['email'];
            }
            if(isset($_SESSION['phone2'])){
                $phone = $_SESSION['phone2'];
                $_SESSION['phone2'] = $row['phone'];
            }
            if(isset($_SESSION['size'])){
                $size = $_SESSION['size'];
                $_SESSION['size'] = $row['size'];
            }
            if(isset($_SESSION['introduction'])){
                $introduction = $_SESSION['introduction'];
                $_SESSION['introduction'] = $row['introduction'];
            }
            if(isset($_SESSION['address'])){
                $address = $_SESSION['address'];
                $_SESSION['address'] = $row['address'];
            }
            echo"
            <div class='form-group'>
                <label for='name'>Company Name:</label>
                <input type='text' name='name' id='company_name' value='$name'>
            </div>";
            if(isset($_SESSION['nameerror'])){
                echo $_SESSION['nameerror'];
                $_SESSION['nameerror'] = "";
            }
            echo"
            <div class='form-group'>
                <label for='size'>Size:</label>
                <input type='text' name='size' id='size' value='$size'>
            </div>";
            if(isset($_SESSION['sizeerror'])){
                echo $_SESSION['sizeerror'];
                $_SESSION['sizeerror'] = "";
            }
            echo"
            <div class='form-group'>
            <label for='introduction'>Introduction:</label>
            <textarea name='introduction' id='introduction' cols='30' rows='10' >$introduction</textarea>
            </div>
            ";
            if(isset($_SESSION['introductionerror'])){
                echo $_SESSION['introductionerror'];
                $_SESSION['introductionerror'] = "";
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
                <label for='email'>Email:</label>
                <input type='email' name='email' id='email' value='$email'>
            </div>";
            if(isset($_SESSION['emailerror'])){
                echo $_SESSION['emailerror'];
                $_SESSION['emailerror'] = "";
            }
            echo"
            <div class='form-group'>
                <label for='address'>Address:</label>
                <input type='text' name='address' id='address' value='$address'>
            </div>";
            if(isset($_SESSION['addresserror'])){
                echo $_SESSION['addresserror'];
                $_SESSION['addresserror'] = "";
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