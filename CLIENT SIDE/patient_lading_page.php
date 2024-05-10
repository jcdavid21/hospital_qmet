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
    <link rel="stylesheet" type="text/css" href="../css/patient/index.css">
	<link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
    <title>Patient Dashboard</title>
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
	<h3 style="font-size: 30px;">Good Day!</h3>

	<!-- PATIENT NAME NA NAKA PHP KASI FEFETCH AFTER MAG LOG IN OR REGISTER -->
	<!-- eto sample ->  <h2><?php echo $row1['patient_name']; ?></h2> -->

	<h2 style="font-size: 50px;" class="patientName">Patient Name</h2>

	<p  style="font-size: 20px;">Want to book an appointment? click on “Schedule Appointment” on the left. To view your current appointments, go <br>to “ View Appointments. If you wish to update the details of your account, click on “Account”.</p>
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
