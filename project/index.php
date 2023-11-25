<!DOCTYPE html>
<html>
	<head>
		 <!-- DEFAULTS  -->
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
		<section class="header">
			<nav>
				<a href="index.html"><img src="images/logo.png"></a>
				<div class="nav-links" id="navLinks">
					<i class="fa fa-times" onclick="hideMenu()"></i>
					<ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="about.php">ABOUT</a></li>
					</ul>	
				</div>
				<i class="fa fa-bars" onclick="openMenu()"></i>
			</nav>

			<div class="text_box">
				<h1>CareerLinkup</h1>
				<p>Do you ever feel like you could dream bigger? There's no better time to start than now.</p>
				<a href="candidate_dashboard.php" class="text_box_button">Continue as candidate</a>
				<a href="company_dashboard.php" class="text_box_button">Continue as business</a>
			</div>
		</section>
		<section>
			<?php
			$openaiClient = \Tectalic\OpenAi\Manager::build(new \GuzzleHttp\Client(), new \Tectalic\OpenAi\Authentication(getenv('OPENAI_API_KEY')));
 
			/** @var \Tectalic\OpenAi\Models\ChatCompletions\CreateResponse $response */
			$response = $openaiClient->chatCompletions()->create(
				new \Tectalic\OpenAi\Models\ChatCompletions\CreateRequest([
					'model' => 'gpt-4',
					'messages' => [
						['role' => 'system', 'content' => 'You are a helpful assistant'],
						['role' => 'user', 'content' => 'Who won the world series in 2020?'],
						['role' => 'assistant', 'content' => 'The Los Angeles Dodgers won the World Series in 2020.'],
						['role' => 'user', 'content' => 'Where was it played?'],
					],
				])
			)->toModel();
			 
			echo $response->choices[0]->message->content;
			?>
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
