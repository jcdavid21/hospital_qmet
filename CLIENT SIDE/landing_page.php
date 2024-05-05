<!DOCTYPE html>
<html>
<head>
	<title>LANDING PAGE</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/x-icon" href="logo.png">
	<style type="text/css">
		
		body
		{
			font-family: Arial, Helvetica, sans-serif;	
		}
		.flex-container 
		{
    		display: flex;
		}

		.flex-child 
		{
    		flex: 1;
    		/*border: 2px solid black;*/

		}  

		.left-section 
		{
    		display: grid;
    		justify-content: center;
    		align-items: center;
    		background-color: #3A7DE0;
    		line-height: 1.6;
    		padding: 0 20px; /* Adjust the padding value as needed */
    		height: calc(100vh - 0px); /* Subtract twice the padding value from 100vh */
		}

		.left-section p
		{
			margin-top: 0;
			margin-bottom: 20px;
		}

		

		.btn-button
		{
			display: flex;
			justify-content: center;
		}

		button
		{
			border: none;
			padding: 10px 50px;
			margin: 15px;
			background-color: #091E3D;
			color: white;
			transition: background-color 0.3s ease;
			cursor: pointer;
		}

		button:hover {
            background-color: #0056b3;
        }

		.right-section 
		{
    		display: flex;
    		justify-content: center;
    		align-items: center;
    		padding: 0 0px; /* Adjust the padding value as needed */
    		height: calc(100vh - 0px); /* Subtract twice the padding value from 100vh */
		}

		.right-section img 
		{
    		height: 100%;
    		width: 100%;
		}


		::-webkit-scrollbar {
            width: 5px;
            background-color: transparent;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background-color: rgba(0, 0, 0, 0);
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background-color: #504B3A;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        .icon-container 
        {
  			position: relative;
		}

		.topleft 
		{
  			position: absolute;
  			top: 20px;
  			left: 20px;
		}

		.fade-out 
		{
 			opacity: 0;
  			transition: opacity 0.5s ease; /* Fade-out transition */
		}

	</style>

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
						<a href="login_Signin.php" style="text-decoration: none; color: white;">Login</a></button>
					<button onclick="goToRegister()"><a href="#" style="text-decoration: none; color: white;">Register</a></button>
					</div>


									<!-- 							 -->


				</div>
			</div>
		</div>

		<div class="flex-child">
			<div class="right-section">
				
					<img src="doctor2.jpg">
			</div>
		</div>
	</div>

<script>
    function goToLogin() {
      document.body.classList.add('fade-out');
      setTimeout(function() {
        window.location.href = 'login_Signin.php';
      }, 500); // Adjust the duration to match the animation duration in CSS
    }
    function goToRegister() {
      document.body.classList.add('fade-out');
      setTimeout(function() {
        window.location.href = 'register.php';
      }, 300); // Adjust the duration to match the animation duration in CSS
    }
  </script>

</body>


</html>