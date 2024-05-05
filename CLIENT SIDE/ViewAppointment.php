<?php require_once("../backend/config/db.php");
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="logo.png">
    <title>View Appointments</title>

    <style type="text/css">

    	body 
    	{
            margin: 0; /* Reset default margin */
            padding: 0; /* Reset default padding */
            font-family: Arial, sans-serif; /* Change the font if needed */
            margin-top: 110px;
        }

        .container 
        {
            display: flex;
            height: 100%;
             /*Ensure full height */
        }

        nav.left-nav
        {
            width: 250px;   /* adjustable width pa to */
            flex: 0 0 auto; /* fixed width ng left nav */
        }

        .content 
        {
        	flex: 1;
        	padding: 20px;
        	margin-left: 25vw;
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
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
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
            height: 100vh;  /*Ensure full height */
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
        	font-family: Arial, Helvetica, sans-serif;
        	box-sizing: border-box;
        	border: none;
        	padding-top: 30px;
        	padding-bottom: 30px;
        	padding-left: 40px;
        	padding-right: 40px;
        	margin-top: 10px;
            margin-left: 10px;
            margin-right: 10px;
        	border-radius: 25px;
        	background: #133C7A;
        	color: white;
        	width: 60rem;

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

        h2
        {
            font-family: monospace;
        }

        .cur-apts
		{
			display: block;
			justify-content: center;
			text-align: center;
			margin-bottom: 50px;
		}

		.past-apts
		{
			display: block;
			justify-content: center;
			text-align: center;

		}

		.cur-apts h1, .past-apts h1
		{
			font-family: sans-serif;
			font-size: 30px;
		}

		table, th, td 
		{
			border-collapse: collapse;
			
			padding: 40px;
		}

		thead
		{
			background: #3A7DE0;
			color: white;
		}

			/* Define the style for the active button */
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
        <li><a href="patient_lading_page.php" id="home">Home</a></li><br>
        <li><a href="Schedule_Appointment.php" id="sched-appt">Schedule Appointment</a></li><br>
        <li><a href="ViewAppointment.php" id="view-appt">View Appointments</a></li><br>
        <li><a href="AccountPage.php" id="acct">Account</a></li><br>
        
    </ul>
</nav>


<div class="content">
    <div class="box-container">
    
    	<div class="cur-apts">

		<div class="cur-title">
			<h1>Current Appointments</h1>
		</div>

		<table>
			<thead>
				<tr>
					<th>Appointments ID</th>
					<th>Category</th>
					<th>Dr. Name</th>
					<th>Date</th>
					<th>Time</th>
				</tr>
			</thead>
			<tbody>
                <?php
                    $account_id = $_SESSION["patient_id"];
                    $query = "SELECT ta.appointment_id, ta.account_id, 
                    ta.appointment_date, ta.appointment_time, ta.status_id, 
                    ti.status_name, ts.specialty_name, 
                    CONCAT(td.first_name, ' ', td.last_name) AS doctor_name 
                    FROM tbl_appointment ta 
                    INNER JOIN tbl_apt_status ti ON ta.status_id = ti.status_id 
                    INNER JOIN tbl_specialty ts ON ta.specialty_id = ts.specialty_id 
                    INNER JOIN tbl_account_details td ON ta.doctor_acc_id = td.account_id
                    WHERE ta.account_id = ? AND ta.status_id = 1";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("i", $account_id);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if($result->num_rows > 0){
                        while($data = $result->fetch_assoc()){
                ?>
				<tr>
					<td><?php echo $data["appointment_id"]; ?></td>
					<td><?php echo $data["specialty_name"]; ?></td>
					<td><?php echo $data["doctor_name"]; ?></td>
					<td><?php echo date("F j, Y", strtotime($data["appointment_date"])); ?></td>
					<td><?php echo $data["appointment_time"]; ?></td>
				</tr>
                <?php }}else{
                ?>
                <tr>
                    <td>N/A</td>
					<td>N/A</td>
					<td>N/A</td>
					<td>N/A</td>
					<td>N/A</td>
                </tr>
                <?php }?>
			</tbody>
		</table>

	</div>

	<div class="past-apts">
		
		<div class="past-title">
			<h1>Past Appointments</h1>
		</div>

		<table>	
			<thead>
				<tr>
					<th>Appointments ID</th>
					<th>Category</th>
					<th>Dr. Name</th>
					<th>Date</th>
					<th>Time</th>
				</tr>
			</thead>
			<tbody>
            <?php
                    $account_id = $_SESSION["patient_id"];
                    $query = "SELECT ta.appointment_id, ta.account_id, 
                    ta.appointment_date, ta.appointment_time, ta.status_id, 
                    ti.status_name, ts.specialty_name, 
                    CONCAT(td.first_name, ' ', td.last_name) AS doctor_name 
                    FROM tbl_appointment ta 
                    INNER JOIN tbl_apt_status ti ON ta.status_id = ti.status_id 
                    INNER JOIN tbl_specialty ts ON ta.specialty_id = ts.specialty_id 
                    INNER JOIN tbl_account_details td ON ta.doctor_acc_id = td.account_id
                    WHERE ta.account_id = ? AND ta.status_id = 2";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("i", $account_id);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if($result->num_rows > 0){
                        while($data = $result->fetch_assoc()){
                ?>
				<tr>
                    <td><?php echo $data["appointment_id"]; ?></td>
					<td><?php echo $data["specialty_name"]; ?></td>
					<td><?php echo $data["doctor_name"]; ?></td>
					<td class="apt_date"><?php echo date("F j, Y", strtotime($data["appointment_date"])); ?></td>
					<td><?php echo $data["appointment_time"]; ?></td>
				</tr>
                <?php }}else{
                ?>
                <tr>
                    <td>N/A</td>
					<td>N/A</td>
					<td>N/A</td>
					<td>N/A</td>
					<td>N/A</td>
                </tr>
                <?php }?>
			</tbody>
		</table>


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
        document.getElementById("home").classList.add("active");
    }
    else if (currentPage.includes("Schedule_Appointment.php")) {
        document.getElementById("sched-appt").classList.add("active");
    }
    else if (currentPage.includes("ViewAppointment.php")) {
        document.getElementById("view-appt").classList.add("active");
    }
    else if (currentPage.includes("AccountPage.php")) {
        document.getElementById("doc-patacct").classList.add("active");
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
