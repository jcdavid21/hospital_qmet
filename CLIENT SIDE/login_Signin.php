<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LOGIN / SIGNUP PAGE</title>
	<link rel="icon" type="image/x-icon" href="logo.png">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../scripts/sweetalert2.js"></script>
    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f2f2f2;
            font-family: sans-serif;
            background-color: #133C7A;
        }
        
        .container {
            width: 30%;
            padding: 20px;
            background-color: #3A7DE0;

        }

        .container p {
            margin: 0 0 10px 0;
            justify-content: center;
            align-items: center;
            display: flex;
        }

        .container input[type="text"],
        .container input[type="password"]
        {
            width: calc(100% - 45px);
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 10px;
            margin-left: 10px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 0px;
            justify-content: center;
            align-items: center;
            display: flex;
        }

        .container input[type="button"] 
        {
            background-color: #091E3D;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
           	width: 30%;
           	display: grid;
           	margin: auto;
           	padding-top: 15px;
           	padding-bottom: 15px;
            border-radius: 10px;
			cursor: pointer;
  			text-decoration: none;
  			border: none;
        }     	

        .container input[type="button"]:hover {
            background-color: #0056b3;
        }

        .container span {
            font-size: 16px; /* Adjust font size */
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

        .invalid{
            color: red;
            margin: -12px 10px 10px 10px;
            opacity: 0;
        }

    </style>

</head>
<body>

    <div class="container">
        
    	<div class="icon-container">
				<div class="topleft">
					<img src="icon.png">
				</div>
		</div>

        <p style="font-size: 35px; margin-top: 20px;">Welcome Back!</p>
        <p style="font-size: 12px; padding-bottom: 20px;">Log in your details to continue</p>

        <form action="#">
            <span style="
            margin-top: 10px;
            margin-bottom: 10px;
            margin-left: 10px;
            margin-right: 10px;">
        	Email:</span><br />
            <input type="text" id="email" name="email" placeholder="Email Address" required />
            <br />
            <span style="
            margin-top: 10px;
            margin-bottom: 10px;
            margin-left: 10px;
            margin-right: 10px;">Password:</span><br />
            <input type="password" id="password" name="password" placeholder="Password" required />
            <br />
            <div class="invalid">Invalid</div>
            <input type="button" id="login" value="Log In">

        </form>
        <br />
        <p style="font-size: 13px;">
        	
        	Don't have an Account?&nbsp;
        	<a href="register.php" style="text-decoration:none; color: black; margin-bottom: 15px; margin-top: 15px;">
        	<b>Sign Up</b>
        </a>

        </p>

    </div>
    <script src="../jquery/login.js"></script>
</body>
</html>
