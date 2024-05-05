<?php require_once("../backend/config/db.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="logo.png">
    <title>Schedule_Appointment</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style type="text/css">

    	body 
    	{
            margin: 0; /* Reset default margin */
            padding: 0; /* Reset default padding */
            font-family: Arial, sans-serif; /* Change the font if needed */
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

        .content 
        {
            flex: 1;
            padding: 20px;
            margin-left: 30vw;
            margin-top: 30px;
        }

        .container 
        {
            position: fixed;
            display: flex;
            height: 100vh;  /*Ensure full height */

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
            position: fixed;
            display: flex;
            height: 100vh;  /*Ensure full height */
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
            max-width: fit-content;
            padding-top: 20px; /* Adjust as needed */
            padding-bottom: 20px;
            padding-left: 200px;
            padding-right: 200px;
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
        	padding: 10px;
        	margin: 10px;
        	width: 30%;
        	margin: auto;
            
        	margin-bottom: 15px;

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

        .invalid{
            color: red;
            opacity: 0;
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
	<h3 style="font-size: 30px; text-align: center; margin-bottom: 50px;">Schedule Appointment</h3>
		<div class="inner-child">

			<div class="demon-1">
			<h3 style="font-size: 25px;">Select Category:</h3>
			<select id="sel-categ">
                <?php
                    $query = "SELECT * FROM tbl_specialty;";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    while($data = $result->fetch_assoc()){
                ?>
				<option value="<?php echo $data["specialty_id"]; ?>" placeholder = "CAT1"><?php echo $data["specialty_name"]; ?></option>
                <?php } ?>
			</select>
			</div>
			<div class="demon-2">
			<h3 style="font-size: 25px;">Select Doctor:</h3>
			<select id="sel-doctor">
                <?php
                    $query = "SELECT td.account_id, td.specialty_id, CONCAT(ad.first_name, ' ', ad.last_name)
                    AS full_name, ts.specialty_name FROM tbl_account_doctor td 
                    INNER JOIN tbl_account_details ad ON td.account_id = ad.account_id 
                    INNER JOIN tbl_specialty ts ON td.specialty_id = ts.specialty_id";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    while($data = $result->fetch_assoc()){
                ?>
				<option value="<?php echo $data["account_id"]; ?>" placeholder = "DOC1">Dr. <?php echo $data["full_name"]; ?></option>
                <?php } ?>
			</select>
			</div>

			<div class="angel-1">
			<h3 style="font-size: 25px;">Appointment Date:</h3>
			<input type="date" id="date" name="apt-date" placeholder="Appointment Date" required />
			</div>

			<div class="angel-2">
			<h3 style="font-size: 25px;">Appointment Time:</h3>
			<select id="sel-time">
				<option value="09:00AM" placeholder = "OPT1">09:00am</option>
				<option value="11:00AM" placeholder = "OPT2">11:00am</option>
				<option value="01:00PM" placeholder = "OPT3">01:00pm</option>
                <option value="03:00PM" placeholder = "OPT3">03:00pm</option>
			</select>
			</div>
            <div class="invalid">Invalid</div>
		</div>
		
		<button class="btn-sched"><a href="#" id="btn-sched1">Schedule an Appointment</a></button>

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

    <script>
        document.addEventListener("DOMContentLoaded", function() {
    var selCateg = document.getElementById("sel-categ");
    var selDoctor = document.getElementById("sel-doctor");

    var specialtyDoctors = {
        <?php
            $query = "SELECT td.account_id, td.specialty_id, CONCAT(ad.first_name, ' ', ad.last_name) AS full_name, ts.specialty_name 
                      FROM tbl_account_doctor td 
                      INNER JOIN tbl_account_details ad ON td.account_id = ad.account_id 
                      INNER JOIN tbl_specialty ts ON td.specialty_id = ts.specialty_id";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();
            while($data = $result->fetch_assoc()){
                echo "'" . $data["specialty_id"] . "': [";
                echo "{ 'accountId': '" . $data["account_id"] . "', 'fullName': 'Dr. " . $data["full_name"] . "' }";
                echo "],";
            }
        ?>
    };

    function updateDoctors() {
        var specialtyId = selCateg.value;
        var doctors = specialtyDoctors[specialtyId];
        selDoctor.innerHTML = ""; 

        var defaultOption = document.createElement("option");
        defaultOption.value = "";
        defaultOption.textContent = "Select Doctor";
        selDoctor.appendChild(defaultOption);

        if (doctors) {
            doctors.forEach(function(doctor) {
                var option = document.createElement("option");
                option.value = doctor.accountId;
                option.textContent = doctor.fullName;
                selDoctor.appendChild(option);
            });
        }
    }

    // Add event listener to the specialty select element
    selCateg.addEventListener("change", updateDoctors);

    // Initial call to populate doctors based on the default selected specialty
    updateDoctors();
});

    </script>
    <script src="../jquery/addAppointment.js"></script>
</body>
</html>
