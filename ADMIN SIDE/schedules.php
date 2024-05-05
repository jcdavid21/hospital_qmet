<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="logo.png">
    <title>Admin Panel - Sched. Man</title>

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
        	padding: 30px;
        	margin-left: 4vw;
        }

       
        nav.left-nav
        {
            width: 250px;   /* adjustable width pa to */
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

        .box-container
        {
            display: flex;
            flex-direction: column;
        }

        h2
        {
            font-family: monospace;
        }

        cur-apts
		{
			display: block;
			justify-content: center;
			text-align: center;
			margin-bottom: 50px;
		}

		.cur-apts h1
		{
			font-family: sans-serif;
			font-size: 30px;
		}

		table, th, td 
		{
			border-collapse: collapse;
			
			padding-top: 40px;
			padding-bottom: 40px;
			padding-left: 50px;
			padding-right: 50px;
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

        li 
        {
            padding: 10px;
        }	

        #event-btn
        {
            display: flex; 
            justify-content: center; 
            align-items: center;
            padding-right: 30px;
            padding-left: 30px;
        }
        a 
        {
            text-decoration: none;
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
    <div class="box-container">
    
    	<div class="cur-apts">

		<div class="cur-title" style="display: flex; justify-content: center; align-items: center;">
            <h1 style="margin-right: 30px;">Schedule Manager</h1>
            <button style="width: 10%; margin-left: 20px;"><a href="AddSchedule.html">Add Schedule</a></button>
        </div>


		<table>
			<thead>
				<tr>
					<th>Schedule ID</th>
					<th>Doctor Name</th>
                    <th>Max Booking</th>
                    <th>Date</th>
					<th>Time</th>
                    <th>Events</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>0001</td>
					<td>Patient Name</td>
                    <td>Doctor Name</td>
                    <td>dd/mm/yy</td>
					<td>00:00am/pm</td>
                    <td >
                        <button id="event-btn">Remove</button>
                    </td>
				</tr>
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
