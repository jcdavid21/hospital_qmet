<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
	<link rel="icon" type="image/x-icon" href="logo.png">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../scripts/sweetalert2.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/main/login.css">
	<link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
</head>
<body>

    <div class="container">
        <p style="font-size: 30px; margin-top: 20px;">Welcome Back!</p>
        <p style="font-size: 12px; padding-bottom: 20px;">Log in your details to continue</p>

        <form action="#">
            <span style="
            margin-top: 10px;
            margin-bottom: 10px;
            margin-left: 10px;
            margin-right: 10px;">
        	Email:</span><br />
            <input type="text" id="email" name="email" placeholder="Email Address" required />
            <span style="
            margin-top: 10px;
            margin-bottom: 10px;
            margin-left: 10px;
            margin-right: 10px;">Password:</span><br />
            <input type="password" id="password" name="password" placeholder="Password" required />
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
