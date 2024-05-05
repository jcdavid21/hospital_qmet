<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Password</title>
	<link rel="icon" type="image/x-icon" href="logo.png">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style type="text/css">
		
        body 
        {

            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f2f2f2;
            font-family: sans-serif;
            background-color: #133C7A;
        }
        

        .container 
        {
            width: 30%;
            padding: 20px;
            background-color: #3A7DE0;
        }

        .container p 
        {
            margin: 0 0 10px 0;
            justify-content: center;
            align-items: center;
            display: flex;
        }

        .container input[type="text"],
        .container input[type="password"],
        .container input[type="number"],
        .container input[type="date"]
        {
            width: calc(100% - 45px);
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 5px;
            margin-left: 10px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 0px;
            justify-content: center;
            align-items: center;
            display: flex;
        }

        .container button
        {

            background-color: #091E3D;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
           	display: grid;
           	margin: auto;
           	padding-top: 15px;
           	padding-bottom: 15px;
            border-radius: 5px;
			cursor: pointer;
  			text-decoration: none;
  			border: none;
        }
    
        	

        .container button:hover {
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

		span
		{
            margin-left: 10px;
            margin-right: 10px;
		}

		.input-groupinings 
		{
    		display: flex;
    		justify-content: space-between;
		}

		.input-groupinings input[type="text"] 
		{
    		width: 48%; /* Adjusted width to fit side by side with spacing */
    		padding: 10px;
    		margin-top: 10px;
    		margin-bottom: 10px;
    		border: 1px solid #ccc;
    		box-sizing: border-box;
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

        .submit-btn 
        {
    		display: flex; /* Use flexbox layout */
    		justify-content: space-between; /* Distribute items evenly along the main axis */
		}

		.submit-btn button
		{
    		flex: 1; /* Distribute available space equally among buttons */
    		margin-top: 15px;
    		margin-right: 5px; /* Add margin between buttons for spacing */
    		margin-left: 5px;
    		max-width: 50%;
    		margin: auto;
		}

        .invalid{
            margin: -12px 10px 10px 10px;
            color: red;
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

        <p style="font-size: 35px; margin-top: 20px;">

        Change Password 

    	</p>
        <p style="font-size: 12px; padding-bottom: 20px;">

         

    	</p>
        <!-- ---------------------------------------------------------------------------- -->
        
        <form action="#" id="myForm"> 
            <span>Password: </span><br />
            <input type="password" id="password" name="pword" placeholder="Password" required /> 

            <br />
            <span>Confirm Password: </span><br />
            <input type="password" id="conpass" name="cpword" placeholder="Confirm Password" required /> 
            <br />
            <div class="invalid">Invalid</div>
            <div class="submit-btn">
            <button id="update">Update Password</button>
            </div>
        </form>

        <br />
        
        <!-- ---------------------------------------------------------------------------- -->
    </div>

<script>
	/*
function myRes() {
    document.getElementById("myForm").reset();
}

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
<script src="../jquery/changepass.js"></script>
</body>
</html>
