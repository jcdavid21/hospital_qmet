<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="logo.png">
    <link rel="stylesheet" type="text/css" href="../css/patient/account.css">
	<link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
    <title>Patient Account</title>
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
