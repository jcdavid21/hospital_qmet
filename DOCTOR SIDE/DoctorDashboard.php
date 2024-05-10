<?php require_once("../backend/config/db.php");
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="logo.png">
    <link rel="stylesheet" type="text/css" href="../css/doctor/index.css">
	<link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
    <title>Doctor Dashboard</title>
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
        <h4 style="font-size: 30px;">Welcome!</h4>

        <h1 style="font-size: 45px;" class="doctorName">Doctor Name</h1>

        <p style="font-size: 20px;">
        Dashboard provides your current status. To view your sessions, go to “My
        Sessions”. Access your patients details in “My Patients”. Edit your profile details in
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
        <h2>Patients: <?php echo $data["patient_count"];?>
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
