<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Clinic Name</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/x-icon" href="logo.png">
	<link rel="stylesheet" type="text/css" href="./css/main/index.css">
	<link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
</head>

<body>
	
	<div class="flex-container">
		<div class="flex-child">

			<div class="icon-container">
				<div class="topleft">
					<img src="icon.png">
				</div>
			</div>

			<div class="left-section">
				<div class="inner-child">
					<p style="font-size: 40px; line-height: 1.3;">
						Welcome to <br>
						Health Institution Name
					</p><br>
		
					<p>
					<span style="font-size: 25px;">Optimize Your Clinic Operations with Ease.</span><br><br>

					<span style="font-size: 20px;">
					Our clinic management system offers comprehensive <br>
					solutions for appointment scheduling, and  patient records <br>
					management. Streamline your workflows and enhance <br>
					patient care with our user-friendly software.
					</span>
					</p>


									<!-- 							 -->
					<div class="btn-button">
					<button onclick="goToLogin()">
						<a href="./CLIENT SIDE/login_Signin.php" style="text-decoration: none; color: white;">Login</a></button>
					<button onclick="goToRegister()"><a href="#" style="text-decoration: none; color: white;">Register</a></button>
					</div>


									<!-- 							 -->


				</div>
			</div>
		</div>

		<div class="flex-child">
			<div class="right-section">
				
					<img src="./CLIENT SIDE/doctor2.jpg">
			</div>
		</div>
	</div>

<script>
    function goToLogin() {
      document.body.classList.add('fade-out');
      setTimeout(function() {
        window.location.href = './CLIENT SIDE/login_Signin.php';
      }, 500); // Adjust the duration to match the animation duration in CSS
    }
    function goToRegister() {
      document.body.classList.add('fade-out');
      setTimeout(function() {
        window.location.href = './CLIENT SIDE/register.php';
      }, 300); // Adjust the duration to match the animation duration in CSS
    }
  </script>

</body>


</html>