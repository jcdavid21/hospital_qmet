<?php require_once("../backend/config/db.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="logo.png">
    <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="../css/admin/index.css">
    <title>Administrator</title>
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
    </ul>
</nav>


<div class="content">
        
		<div class="inner-content">
            <div class="title-box">
            <h1>Admin Panel</h1>
            <h2>Status:</h2>
        </div>
        <div class="table-container">
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
                            <img src="doctor.png" width="100px" height="100px" style="margin-top: 30px;" />
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
