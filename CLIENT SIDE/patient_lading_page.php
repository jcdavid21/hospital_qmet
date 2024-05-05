<?php 
    require_once("../backend/config/db.php");
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="logo.png">
    <title>Patient L_Page</title>

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
        	margin-left: 300px;
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

		.container
		{
			display: flex;
			height: 100vh;
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

        .inner-container 
        {
        
            justify-content: center;
            align-items: center;
            max-width: fit-content;
            margin-bottom: 100px;
            padding-top: 50px; /* Adjust as needed */
            padding-bottom: 50px;
            padding-left: 150px;
            padding-right: 150px;
            box-sizing: border-box;
            border: none;
            background: #133C7A;
            border-radius: 15px;
            color: white;
        }

        nav ul li a.active 
        {
            color: #DBCFB0; /* Change to your desired highlighted color */
            /* Add other styles as needed */
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
	<h3 style="font-size: 40px;">Good Day!</h3>

	<!-- PATIENT NAME NA NAKA PHP KASI FEFETCH AFTER MAG LOG IN OR REGISTER -->
	<!-- eto sample ->  <h2><?php echo $row1['patient_name']; ?></h2> -->

	<h2 style="font-size: 50px;" class="patientName">Patient Name</h2>

	<p  style="font-size: 20px;">Want to book an appointment? click on “Schedule Appointment” on the left. To<br> view your current appointments, go to “ View Appointments. If you wish to update<br> the details of your account, click on “Account”.</p>
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
            console.log(patientDetails);
            const patientNameElements = document.querySelectorAll(".patientName");
            patientNameElements.forEach(element => {
                element.innerText = patientDetails.full_name;
            });
        }
    </script>



</body>
</html>
