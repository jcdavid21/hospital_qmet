<?php require_once("../backend/config/db.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="logo.png">
    <title>Administrator</title>

    <style type="text/css">

    	body 
    	{
            margin: 0; /* Reset default margin */
            padding: 0; /* Reset default padding */
            font-family: Arial, sans-serif; /* Change the font if needed */
            background: #EFF2EF;
        }

        .container 
        {
        	position: fixed;
            display: flex;
            height: 100vh;  /*Ensure full height */

        }

        .content 
        {
            display: flex;
            flex-direction: column; /* Stack children vertically */
            align-items: center; /* Center horizontally */
            justify-content: center; /* Center vertically */
            margin: 20px;
        }


        nav.left-nav
        {
        	width: 250px;	/* adjustable width pa to */
        	flex: 0 0 auto; /* fixed width ng left nav */
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

        ul
        {
            background: #3A7DE0;
            color: white;
            padding: 10px;
            left: 0; 
            height: 100vh;
            background: #3A7DE0;
            color: white;
            justify-content: center; 
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


        nav ul li a.active 
        {
            color: #DBCFB0; /* Change to your desired highlighted color */
            /* Add other styles as needed */
        }   

        h2
        {
            font-family: monospace;
        }


			/* Define the style for the active button */
		nav ul li a.active 
		{
    		color: #DBCFB0; /* Change to your desired highlighted color */
    		/* Add other styles as needed */
		}	

        .title-box 
        {
            text-align: center;
            margin-top: 20px; /* Adjust as needed */
        }

        .inner-content {
            display: flex;
            justify-content: center;
            align-items: center;
            max-width: fit-content;
            margin-left: 200px;
            margin-bottom: 100px;
            padding: 20px; /* Adjust as needed */
            box-sizing: border-box;
            border: none;
            background: #EDB88B;
            box-shadow: 10px 8px #CD5334;
        }


        table td 
        {
            padding: 50px; /* Adjust as needed */
        }

        li 
        {
            padding: 10px;
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
    	<img src="admin1.png" width="100px" height="100px" style="margin-top: 30px;" /><br />

    	<h3>Admin</h3> <!-- fetch client name -->

        <a href="./logout.php" class="log-out"><button>Log Out</button></a>
        <hr style="height: 1px; width: 50%;" color="black" /><br>
        <li><a href="index.php" id="status">Status</a></li><br>
        <li><a href="doctors.php" id="dochehe">Doctors</a></li><br>
        <li><a href="patients.php" id="pathehe">Patients</a></li><br>
        <li><a href="appointments.php" id="apphehe">Appointments</a></li><br>
        <li><a href="schedules.php" id="sched">Schedule</a></li><br>
        
    </ul>
</nav>


<div class="content">
        
		<div class="inner-content">
            <div class="title-box">
            <h1>Admin Panel</h1>
            <h2>Status:</h2>
        </div>
            <table>
                <thead>
                    <tr>
                        <?php
                            $query = "SELECT COUNT(account_id) AS count FROM tbl_account WHERE role_id = 2";
                            $stmt = $conn->prepare($query);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            $data = $result->fetch_assoc();
                        ?>
                        <td>
                            <img src="doctor.png" width="100px" height="100px" />
                            <h1>Doctor</h1>
                            <h1><?php echo $data["count"]; ?></h1>
                        </td>
                        <?php
                            $query = "SELECT COUNT(account_id) AS count FROM tbl_appointment WHERE status_id = 1";
                            $stmt = $conn->prepare($query);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            $data = $result->fetch_assoc();
                        ?>
                        <td>
                            <img src="patient.png" width="100px" height="100px" style="margin-top: 30px;" />
                            <h1>Patients</h1>
                            <h1><?php echo $data["count"]; ?></h1>
                        </td>
                        <?php
                            $query = "SELECT COUNT(account_id) AS count FROM tbl_appointment";
                            $stmt = $conn->prepare($query);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            $data = $result->fetch_assoc();
                        ?>
                        <td>
                            <img src="session.png" width="100px" height="100px" style="margin-top: 30px;" />
                            <h1>Sessions</h1>
                            <h1><?php echo $data["count"]; ?></h1>
                        </td>
                    </tr>
                </thead>
            </table>
        </div>

</div>
</div>

    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
    // Get the current page URL
    var currentPage = window.location.href;

    // Check which page is current and add active class to its corresponding button
    if (currentPage.includes("index.php")) {
        document.getElementById("status").classList.add("active");
    }
    else if (currentPage.includes("doctors.php")) {
        document.getElementById("dochehe").classList.add("active");
    }
    else if (currentPage.includes("patients.php")) {
        document.getElementById("pathehe").classList.add("active");
    }
    else if (currentPage.includes("appointments.php")) {
        document.getElementById("apphehe").classList.add("active");
    }
    else if (currentPage.includes("schedules.php")) {
        document.getElementById("sched").classList.add("active");
    }
    else if (currentPage.includes("clinic.php")) {
        document.getElementById("clin").classList.add("active");
    }
    
    // Add more conditions for other pages as needed
    });

    </script>

</body>
</html>
