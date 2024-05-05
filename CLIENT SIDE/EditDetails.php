<?php 
    require_once("../backend/config/db.php");
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Details</title>
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

        Let’s get started!

    	</p>
        <p style="font-size: 12px; padding-bottom: 20px;">

        Access expert guidance by entering your details 

    	</p>

        <?php 
            $account_id = $_SESSION["patient_id"];
            $query = "SELECT ta.account_id, ta.acc_email,
            td.first_name, td.last_name, 
            td.address, td.contact, td.birth_date
            FROM tbl_account ta 
            INNER JOIN tbl_account_details td ON td.account_id = ta.account_id 
            WHERE ta.account_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $account_id);
            $stmt->execute();
            $result = $stmt->get_result();
            if($result->num_rows > 0){
                $data = $result->fetch_assoc();
        ?>

        <form action="#" id="myForm"> <!-- pang call natin sa js (myForm) -->
            <span>Name:</span><br />
            <div class="input-groupinings">
            <input type="text" id="fname" name="fname" placeholder="First Name" value="<?php echo $data["first_name"]; ?>" required />
            <input type="text" id="lname" name="lname" placeholder="Last Name" value="<?php echo $data["last_name"]; ?>" required />
			</div>

            <br />
            <span>Address: </span><br />
            <input type="text" name="LokasyonMo" id="address"
            value="<?php echo $data["address"]; ?>" placeholder="Complete Address" required />

            <br />
            <span>Contact Number: </span><br />
            <input type="number" id="contact"
            value="<?php echo $data["contact"]; ?>" name="Contacts" placeholder="Active Phone Number" required />

            <br />
            <span>Date of Birth: </span><br />
            <input type="date" id="birthdate" name="bday" placeholder="dd/mm/yy"
            value="<?php echo $data["birth_date"]; ?>" required />

            <br />
            <span>Email: </span><br />
            <input type="text" id="email" name="email" placeholder="Email Address"
            value="<?php echo $data["acc_email"]; ?>" required />
            <br /> 

            <div class="submit-btn">
            
            <button id="update">Update Details</button>
			</div>
        </form>
        <?php } ?>
        <br />
        

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


<script src="../jquery/updateDetails.js"></script>
</body>
</html>
