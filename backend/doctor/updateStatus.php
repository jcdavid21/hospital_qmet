<?php  

    require_once("../config/db.php");
    session_start();

    if(isset($_POST["appointment_id"])){
        $appointment_id = $_POST["appointment_id"];
        $query = "UPDATE tbl_appointment 
        SET status_id = 2
        WHERE appointment_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $appointment_id);
        $stmt->execute();
        echo "success";
    }
?>