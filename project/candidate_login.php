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
                    <li><a href="about.php">ABOUT</a></li>
                </ul>	
            </div>
            <i class="fa fa-bars" onclick="openMenu()"></i>
        </nav>
        <h1>Candidate Login</h1>
    </section>

    <section class="aform">
        <form action="process_candidate_login.php" method="post">
            <fieldset>
            <?php
            session_start();
            
            echo"
            <div class='form-group'>
                <label for='name'>Candidate Name:</label>
                <input type='text' name='name' id='name'>
                <label for='password'>Password:</label>
                <input type='text' name='password' id='password'>";
            if(isset($_SESSION['candidate_login_error'])){
                echo $_SESSION['candidate_login_error'];
                $_SESSION['candidate_login_error'] = "";
            }
            echo"
            </div>";
            ?>
            
            <div id="form-group-final">
                <input type="submit" value="Login" class="snr">
                <input type="submit" formaction='process_candidate_register.php' value="Register" class="snr">
                <!---<input type="submit" formaction='candidate.php' value="Create new profile" class="snr">-->
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