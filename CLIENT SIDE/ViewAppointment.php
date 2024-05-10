<?php require_once("../backend/config/db.php");
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="logo.png">
    <link rel="stylesheet" type="text/css" href="../css/patient/viewapp.css">
	<link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
    <title>View Appointments</title>
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
					<th>Doctor Name</th>
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
					<th>Doctor Name</th>
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
