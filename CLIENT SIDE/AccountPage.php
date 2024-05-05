<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="logo.png">
    <title>Patient Account</title>
    <style type="text/css">

    	body 
    	{
            margin: 0; /* Reset default margin */
            padding: 0; /* Reset default padding */
            font-family: Arial, sans-serif; /* Change the font if needed */
        }

        .container 
        {
        	position: fixed;
            display: flex;
            height: 100vh;  /*Ensure full height */
        }

        nav.left-nav
        {
        	width: 250px;	/* adjustable width pa to */
        	flex: 0 0 auto; /* fixed width ng left nav */
        }

       .content 
        {
            flex: 1;
            padding: 20px;
            margin-left: 35vw;
        }


        .container 
        {
            position: fixed;
            display: flex;
            height: 100vh;  /*Ensure full height */

        }

        header 
        {
            background: #091E3D;
            color: white;
            padding: 10px;
            box-sizing: border-box;
            border: solid black 1px;
            display: flex;
            justify-content: space-between;
            align-items: center;

        }

        header img 
        {
            height: 50px; /* Adjust as needed */
            width: auto; /* Maintain aspect ratio */
        }

        .header-title h1
        {
        	flex-grow: 1;
        	text-align: center;
        }


        .topleft
        {
        	display: flex;
    		align-items: center;
        }

        .topleft img
        {
        	margin: 20px;
        }

        .topleft:hover img
        {
        	transform: scale(1.1);
        	/*filter: grayscale(100%) brightness(50%);*/
        }

        .topright
        {
        	margin: 20px;
        }

        nav ul 
		{
    		list-style-type: none; /* Remove default list styling */
    		padding: 0; /* Remove default padding */
		}

		nav ul li 
		{
    		display: block; /* Display list items horizontally */
    		margin-right: 10px; /* Adjust spacing between list items */
		}	

		nav ul li a:hover 
		{
    		color: white; /* hover sa kulay ng font */
		}

        .left-nav ul
        {
        
        	list-style-type: none;
        	margin: 0;
        	padding: 0;

        }

        .left-nav a
        {
        	 text-decoration: none;     	
        }


         nav 
        {
            background: #3A7DE0;
            color: white;
            padding: 10px;
            position: fixed;
            left: 0; 
            height: 100vh;
            background: #3A7DE0;
            color: white;
            padding: 10px;
            display: flex; /* Use flexbox */
            justify-content: center; 
            text-align: center;
        }

		button
        {
            background: #091E3D;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 70%;
            display: grid;
            margin: auto;
            padding-top: 10px;
            padding-bottom: 10px;
            margin-bottom: 20px;
            /*border-radius: 10px;*/
            cursor: pointer;
            text-decoration: none;
            border: none;
        }

         hr
        {
            width: 70%;
        }

		button:hover 
		{
            background-color: #DBCFB0;
        }

		li a 
		{
			color: black;
		}

		.log-out
		{
			color: white;
		}

        .inner-container 
        {
        
            justify-content: center;
            align-items: center;
            margin-bottom: 100px;
            width: 600px;
            padding-top: 50px; /* Adjust as needed */
            padding-bottom: 50px;
            padding-left: 30px;
            padding-right: 30px;
            box-sizing: border-box;
            border: none;
            background: #133C7A;
            border-radius: 15px;
            color: white;
        }

        .inner-child
        {

        	display: grid;
        	grid-template-columns: repeat(2, 1fr); /* Two columns */
        	grid-gap: 5px; 
        	margin-bottom: 30px;

        }

        .demon-1,
    	.demon-2 
    	{
        	grid-column: span 1; /* Occupy one column */
        	text-align: center;
    	}

    	.angel-1,
    	.angel-2 {
        	grid-column: span 1; /* Occupy two columns */
        	text-align: center;
    	}

    

        .btn-sched
        {
        	padding: 20px;
        	margin: 20px;
        	width: 30%;
        	margin: auto;
        	margin-bottom: 20px;

        }

        #btn-sched1
        {
        	text-decoration: none;
        	color: white;
        	font-size: 15px;

        }

        select
        {
        	font-size: 20px;
        }

        nav ul li a.active 
        {
            color: #DBCFB0; /* Change to your desired highlighted color */
            /* Add other styles as needed */
        }   

        .patient-name, .dbirth, .em-add, .con-num, .tirahan
        {
        	display: flex; 
			flex-direction: row; 
			flex-wrap: wrap;
			justify-content: space-between; 
			padding: 5x;
            gap: 10px;
		}

		.inner-title
		{
			display: block;
			justify-content: center;
			text-align: center;
		}

		.inner-btn a 
		{
    		display: inline-block; /* Display as inline block to make it clickable */
    		text-decoration: none; /* Remove default underline */
    		/*border: solid black 1px;  Add border */
    		padding: 5px 10px; /* Add padding for button size */
    		margin-right: 10px; /* Add margin between buttons if needed */
    		text-align: center; /* Center text horizontally */
    		line-height: normal; /* Reset line height */
    		color: white;
    		border-radius: 10px;
    		background: #091E3D;
    		font-size: 15px;
    		padding: 12px;
    		transition: background-color 0.3s ease;
		}

		.inner-btn a:hover 
		{
    		background-color: #545775; /* Change background color on hover */
		}

		.inner-btn 
		{
    		text-align: center; /* Center the buttons horizontally */
    		color: white;
		}

       


    </style>

</head>
<body>

<header>
    <div class="topleft">
        <img src="icon.png" alt="Clinic Logo">
        <h1 class="header-title">Clinic Name</h1>
    </div>

    <div class="topright" id="dateDisplay">
        <script>
    var today = new Date();
    var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    document.getElementById('dateDisplay').textContent = today.toLocaleDateString('en-US', options);
</script>
    </div>
</header>

<div class="container">
<nav class="left-nav">
    <ul>
    	<img src="patient.png" width="100px" height="100px" /><br />

    	<h3 class="patientName">Patient Name</h3> <!-- fetch client name -->

        <a href="./logout.php" class="log-out"><button>Log Out</button></a>
        <hr style="height: 1px;" color="black" /><br>
        <li><a href="patient_lading_page.php" id="home-page">Home</a></li><br>
        <li><a href="Schedule_Appointment.php" id="sched-page">Schedule Appointment</a></li><br>
        <li><a href="ViewAppointment.php" id="view-page">View Appointments</a></li><br>
        <li><a href="AccountPage.php" id="acc-page">Account</a></li>
    </ul>
</nav>


<div class="content">
    <div class="inner-container">
	<div class="inner-title"><h1>Patient's Account</h1></div>

		<div class="patient-name">
			<h3>Patient's Name:</h3>
			<h3 class="patientName">SAMPLE NAME<!--FETCH THROUGH DATABASE--></h3>
		</div>

		<div class="tirahan">
			<h3>Address</h3>
			<p class="address"><!--FETCH THROUGH DATABASE--></p>
		</div>

		<div class="dbirth">
			<h3>Date of Birth:</h3>
			<h3 class="birthdate"><!--FETCH THROUGH DATABASE--></h3>
		</div>
		<div class="em-add">
			<h3>Email Address:</h3>
			<h3 class="email"><!--FETCH THROUGH DATABASE--></h3>
		</div>
		<div class="con-num">
			<h3>Contact Number:</h3>
			<h3 class="contact"><!--FETCH THROUGH DATABASE--></h3>
		</div>

			<div class="inner-btn">
				<a href="./EditDetails.php">Edit Details</a>
				<a href="./UpdatePassword.php">Change Password</a>
			</div>
		</div>		
	</div>
</div>
</div>

    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
    // Get the current page URL
    var currentPage = window.location.href;

    // Check which page is current and add active class to its corresponding button
    if (currentPage.includes("patient_lading_page.php")) {
        document.getElementById("home-page").classList.add("active");
    }
    else if (currentPage.includes("Schedule_Appointment.php")) {
        document.getElementById("sched-page").classList.add("active");
    }
    else if (currentPage.includes("ViewAppointment.php")) {
        document.getElementById("view-page").classList.add("active");
    }
    else if (currentPage.includes("AccountPage.php")) {
        document.getElementById("acc-page").classList.add("active");
    }
    // Add more conditions for other pages as needed
    });

    </script>
    <script>
    const patientDetailsJSON = localStorage.getItem("patientDetails");
    if (patientDetailsJSON) {
        const patientDetails = JSON.parse(patientDetailsJSON);
        const address = document.querySelector(".address");
        const datebirth = document.querySelector(".birthdate");
        const email = document.querySelector(".email");
        const contact = document.querySelector(".contact");
        console.log(patientDetails);
        address.innerText = patientDetails.address;
        
        // Convert birth date to the desired format
        const birthDate = new Date(patientDetails.birth_date);
        const options = { month: 'long', day: 'numeric', year: 'numeric' };
        const formattedBirthDate = birthDate.toLocaleDateString('en-US', options);
        datebirth.innerText = formattedBirthDate;
        
        email.innerText = patientDetails.email;
        contact.innerText = patientDetails.contact;

        const patientNameElements = document.querySelectorAll(".patientName");
        patientNameElements.forEach(element => {
            element.innerText = patientDetails.full_name;
        });
    }
</script>

</body>
</html>
