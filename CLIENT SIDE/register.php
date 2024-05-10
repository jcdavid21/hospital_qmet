<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
	<link rel="icon" type="image/x-icon" href="logo.png">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/main/register.css">
	<link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
</head>
<body>

    <div class="container">
        <p style="font-size: 35px; margin-top: 20px;">

        Let’s get started!

    	</p>
        <p style="font-size: 12px; padding-bottom: 20px;">

        Access expert guidance by entering your details 

    	</p>

        <form action="#" id="myForm"> <!-- pang call natin sa js (myForm) -->
            <span>Name:</span><br />
            <div class="input-groupinings">
            <input type="text" id="fname" name="fname" placeholder="First Name" required />
            <input type="text" id="lname" name="lname" placeholder="Last Name" required />
			</div>

            <br />
            <span>Address: </span><br />
            <input type="text" id="address" name="LokasyonMo" placeholder="Complete Address" required />

            <br />
            <span>Contact Number: </span><br />
            <input type="number" id="contact" max="11" name="Contacts" placeholder="Active Phone Number" required />

            <br />
            <span>Date of Birth: </span><br />
            <input type="date" id="birthdate" name="bday" placeholder="dd/mm/yy" required />

            <br />
            <span>Email: </span><br />
            <input type="text" id="email" name="email" placeholder="Email Address" required />
            <br /> 

            <span>Password: </span><br />
            <input type="password" id="password" name="pword" placeholder="Password" required /> 

            <br />
            <span>Confirm Password: </span><br />
            <input type="password" id="confirmPass" name="cpword" placeholder="Confirm Password" required /> 
            <div class="invalid">Invalid Password</div>

            <div class="submit-btn">
            <button onclick="myRes()">Reset</button>
            <button id="register">Register</button>
			</div>
        </form>

        <br />
        <p style="font-size: 13px;">
        	
        	Have an Account?&nbsp;
        	<a href="login_Signin.php" style="text-decoration:none; color: black; margin-bottom: 15px; margin-top: 15px;">
        	<b>Log In</b>
        </a>

        </p>

    </div>

<script src="../jquery/signup.js"></script>
<script>
function myRes() {
    document.getElementById("myForm").reset();
}

/*
function validateForm() {
    var inputs = document.querySelectorAll('#myForm input[required], #myForm textarea[required]');
    var isValid = true;

    inputs.forEach(function(input) {
        if (input.value.trim() === '') {
            isValid = false;
            input.style.border = "1px solid red"; // Highlight empty fields
        } else {
            input.style.border = "1px solid #ccc"; // Reset border color
        }
    });

    if (isValid) {
        // Proceed to the next page if all inputs are filled out
        goToClinic();
    } else {
        alert("Please fill out all required fields.");
    }
}

function goToClinic() {
    document.body.classList.add('fade-out');
    setTimeout(function() {
        window.location.href = 'clinic.html';
    }, 500);
}*/
</script>
</body>
</html>
