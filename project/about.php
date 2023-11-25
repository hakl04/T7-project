<!DOCTYPE html>
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
                    <li><a href="about.php">ABOUT</a></li>
                </ul>	
            </div>
            <i class="fa fa-bars" onclick="openMenu()"></i>
        </nav>
        <h1>About Us</h1>
    </section>
    

    <section id="aboutsection">
        <div id="whatwedo-container">
            <div id="whatwedo">
                <h1>What We Do</h1>
                <p>At Greeliving, we are a dynamic platform connecting career aspirations with global job opportunities. Our mission is to empower individuals to continuously enhance their skills and expand their professional network, enabling them to create a secure and prosperous life, whether they are in the United States, Vietnam, or any other part of the world.</p>
            </div>
        </div>



        <div id="visionandmission">
            <div id="vision">
                <h1>Vision</h1>
                <p>Our vision is to facilitate global labor mobility, recognizing that every individual can thrive when they have the opportunity to unleash their full potential in their careers, learning, and life. We aim to be the catalyst for lifelong learning and development, whether you're residing, studying, or working in any country around the globe.</p>
            </div>
    
            <div id="mission">
                <h1>Mission</h1>
                <p>Each person is a vital contributor to society's progress. Society thrives when individuals are given the means to maximize their potential in education, work, and life. Greeliving' mission is to identify and bridge the development needs of each individual with global educational institutions and employers, fostering a lifelong learning process and career growth, whether you are living, learning, or working in any part of the world. Our motto: "Lifelong learning for an ideal global career."</p>
            </div>
        </div>


        <div id="corevalue-container">
            <div id="corevalue">
                <h1>Core value</h1>
                <p>At Greeliving, our commitment to excellence is reflected in our core values:</p>
                <ol>
                    <li><img src="images/job-seeker.png" alt="Empowering Job Seekers"><p>Empowering Job Seekers</p></li>
                    <li><img src="images/strong-connection.png" alt="Building Strong Connections"><p>Building Strong Connections</p></li>
                    <li><img src="images/innovation.png" alt="Innovation and Adaptability"><p>Innovation and Adaptability</p></li>
                    <li><img src="images/honesty.png" alt="Transparency and Integrity"><p>Transparency and Integrity</p></li>
                </ol>
            </div>
        </div>

        <div id="leadingteam">
            <h1>Leading team</h1>
            <p>Our leadership team is composed of seasoned professionals dedicated to making global job opportunities accessible and seamless for everyone. They bring a wealth of experience to drive our mission forward.</p>
        </div>

        <div id="ourpartners">
            <h1>Our partners</h1>
            <p>Greeliving collaborates with a diverse network of esteemed educational institutions and employers worldwide. We work hand-in-hand with our partners to create a seamless connection between job seekers and job providers.</p>
        </div>

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
