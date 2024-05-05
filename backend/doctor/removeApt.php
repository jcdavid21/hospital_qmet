<?php 
    require_once("../config/db.php");

    if(isset($_POST["appointment_id"])){
        $appointment_id = $_POST["appointment_id"];
        $query1 = "DELETE FROM tbl_appointment WHERE appointment_id = ?";
        $stmt1 = $conn->prepare($query1);
        $stmt1->bind_param("i", $appointment_id);
        $stmt1->execute();

        echo "success";
    }
    
?>