<?php require_once("../backend/config/db.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="logo.png">
    <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
    <title>Admin Panel - Patients</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<style type="text/css">

    body 
    {
        margin: 0; /* Reset default margin */
        padding: 0; /* Reset default padding */
        font-family: 'Open Sans'; /* Change the font if needed */
        height: 100vh;  /*Ensure full height */
        margin-bottom:  100px;
    }

    .container 
    {
        display: flex;
        margin-top:  110px;
    }

    nav.left-nav
    {
        width: 220px;	/* adjustable width pa to */
        flex: 0 0 auto; /* fixed width ng left nav */
        margin-top: 3px;
    }

    .content 
    {
        flex: 1;
        padding: 20px;
        margin-left: 5%;
        margin-top: 50px;
    }


    hr 
    {
        width: 70%;
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
        width: 100%;
        display: grid;
        margin: auto;
        padding-top: 10px;
        padding-bottom: 10px;
        margin-bottom: 20px;
        border-radius: 10px;
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

    .cur-apts
    {
        display: block;
        justify-content: center;
        margin-bottom: 50px;
    }

    .past-apts
    {
        display: block;
        justify-content: center;
    }

    .cur-apts h1, .past-apts h1
    {
        font-family: sans-serif;
        font-size: 30px;
    }

    table, th, td 
    {
        border-collapse: collapse;
        
        padding: 20px 40px;
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
    
    table {
        width: 120%;
        margin-top: 20px;;
    }

    .content h1 {
        margin-left: 230px;
    }

    .modal-footer {
      justify-content: center; /* Center horizontally */
    align-items: center;
    }

    .modal-header button {
      width: 100px; /* Adjust the width as needed */
      height: 65px;
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
        
    </ul>
</nav>


<div class="content">
    <div class="box-container">
    
    	<div class="cur-apts">

		<div class="cur-title" style="display: flex; justify-content: center; align-items: center;">
            <h1 style="margin-right: 30px;">Patients</h1>
        </div>


		<table>
			<thead>
				<tr>
					<th>Patient ID</th>
					<th>Patient Name</th>
					<th>Date of Birth</th>
                    <th>Email Address</th>
					<th>Contact Number</th>
                    <th>Events</th>
				</tr>
			</thead>
			<tbody>
                <?php 
                    $query = "SELECT ta.account_id, ta.acc_email, ta.role_id, 
                    td.first_name, td.last_name, CONCAT(td.first_name, ' ', td.last_name) AS full_name,
                    td.address, td.contact, td.birth_date
                    FROM tbl_account ta
                    INNER JOIN tbl_account_details td ON ta.account_id = td.account_id
                    WHERE ta.role_id = 1";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if($result->num_rows > 0){
                    while($data = $result->fetch_assoc()){
                ?>
				<tr>
					<td><?php echo $data["account_id"]; ?></td>
					<td><?php echo $data["full_name"]; ?></td>
                    <td><?php echo date("F j, Y", strtotime($data["birth_date"])); ?></td>
					<td><?php echo $data["acc_email"]; ?></td>
					<td><?php echo $data["contact"]; ?></td>
                    <td >
                        <button id="event-btn"
                        data-toggle="modal" 
                        data-target="#exampleModal<?php echo $data["account_id"]?>">View</button>
                    </td>
				</tr>

<div class="modal fade" id="exampleModal<?php echo $data["account_id"]?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Patient Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label" >First name: </label disabled >
            <input type="text" class="form-control fname" value="<?php echo $data["first_name"]?>"disabled  >
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label" >Last name: </label>
            <input type="text" class="form-control lname" value="<?php echo $data["last_name"]?>" disabled>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label" >Email: </label>
            <input type="email" class="form-control email" value="<?php echo $data["acc_email"]?>" disabled>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label" >Birth Date:</label>
            <input type="date" class="form-control specialty" value="<?php echo $data["birth_date"]?>" disabled >
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label" >Adddress:</label>
            <input type="text" class="form-control address" value="<?php echo $data["address"]?>" disabled>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label" >Contact:</label>
            <input type="text" class="form-control contact" value="<?php echo $data["contact"]?>" disabled>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
                <?php }}else{
                ?>
                <tr>
                    <td>N/A</td>
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
