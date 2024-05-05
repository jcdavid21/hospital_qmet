<?php require_once("../backend/config/db.php");
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="logo.png">
    <title>Doctor Dashboard</title>

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
        	margin-left: 20vw;
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
            padding-top: 20px; /* Adjust as needed */
            padding-bottom: 20px;
            padding-left: 240px;
            padding-right: 240px;
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

        .box-container
        {
            display: flex;
            flex-direction: column;
        }

        .below-inner-container
        {
            box-sizing: border-box;
            /*border: solid black 1px;*/
            padding-bottom: 20px;
            padding-left: 30px;
            padding-right: 30px;
            margin: 10px;
            border-radius: 25px;
        }

        h2
        {
            font-family: monospace;
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
    	<a href="./EditDoctorDetails.php">
        <div class="img-con" style="border-radius: 500px; overflow: hidden;">
            <?php 
                $account_id = $_SESSION["doctor_id"];
                $query = "SELECT * FROM tbl_account_doctor WHERE account_id = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("i", $account_id);
                $stmt->execute();
                $result = $stmt->get_result();
                $data = $result->fetch_assoc();
            ?>
            <img style="height: 120px; object-fit: cover;" src="../ADMIN SIDE/profile/<?php echo $data["profile_img"]; ?>" width="100%" height="100%" style="margin-top: 30px;" /><br />
        </div>
        </a>

    	<h3 class="doctorName">Doctor Name</h3> <!-- fetch client name -->

        <a href="./logout.php" class="log-out"><button>Log Out</button></a>
        <hr style="height: 1px;" color="black" /><br>
        <li><a href="DoctorDashboard.php" id="doc-dash">Dashboard</a></li><br>
        <li><a href="DoctorSessions.php" id="doc-ses">My Sessions</a></li><br>
        <li><a href="DoctorPatients.php" id="doc-pat">My Patients</a></li><br>
        
    </ul>
</nav>


<div class="content">
    <div class="box-container">
    <div class="inner-container">
        <h4 style="font-size: 45px;">Welcome!</h4>

        <h1 style="font-size: 50px;" class="doctorName">Doctor Name</h1>

        <p style="font-size: 20px;">
        Dashboard provides your current status. To view your sessions, go to “My<br>
        Sessions”. Access your patients details in “My Patients”. Edit your profile details in<br>
        “Account”.
        </p>			
	</div>

    <div class="below-inner-container">
        <h1>Status</h1>
        <?php 
            $account_id = $_SESSION["doctor_id"];
            $query = "SELECT appointment_date FROM tbl_appointment WHERE doctor_acc_id = ? AND status_id  = 1";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $account_id);
            $stmt->execute();
            $result = $stmt->get_result();

            // Get today's date
            $today_date = date("Y-m-d");
            $count = 0;

            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $appointment_date = $row['appointment_date'];
                    
                    if($today_date == $appointment_date){
                        $count += 1;
                    }
                }
            }
        ?>

        <h2>Today's Sessions <?php echo $count; ?>
         </h2>
         <?php 
            $query = "SELECT COUNT(appointment_date) as patient_count FROM tbl_appointment WHERE doctor_acc_id = ? AND status_id = 1";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $account_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = $result->fetch_assoc();
        ?>
        <h2>Patients <?php echo $data["patient_count"];?>
        </h2>
    </div>
    </div>

</div>
</div>

    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
    // Get the current page URL
    var currentPage = window.location.href;

    // Check which page is current and add active class to its corresponding button
    if (currentPage.includes("DoctorDashboard.php")) {
        document.getElementById("doc-dash").classList.add("active");
    }
    else if (currentPage.includes("DoctorSessions.php")) {
        document.getElementById("doc-ses").classList.add("active");
    }
    else if (currentPage.includes("DoctorPatients.php")) {
        document.getElementById("doc-pat").classList.add("active");
    }
    
    // Add more conditions for other pages as needed
    });

    </script>
    <script>
        const doctorDetailsJSON = localStorage.getItem("doctorDetails");
        if (doctorDetailsJSON) {
            const doctorDetails = JSON.parse(doctorDetailsJSON);
            console.log(doctorDetails);
            const doctorNameElements = document.querySelectorAll(".doctorName");
            doctorNameElements.forEach(element => {
                element.innerText = doctorDetails.full_name;
            });
        }
    </script>

</body>
</html>
