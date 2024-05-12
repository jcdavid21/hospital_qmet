<?php 
    require_once("../config/db.php");
    session_start();

    if(isset($_POST["specialty_id"]) && isset($_POST["doctor_id"])
    && isset($_POST["apt_date"]) && isset($_POST["apt_time"]))
    {
        $account_id = $_SESSION["patient_id"];
        $specialty_id = $_POST["specialty_id"];
        $doctor_id = $_POST["doctor_id"];
        $apt_date = $_POST["apt_date"];
        $apt_time = $_POST["apt_time"];

        $query = "SELECT * FROM tbl_appointment 
        WHERE doctor_acc_id = ? AND appointment_date = ? AND appointment_time = ? AND status_id = 1";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("iss", $doctor_id, $apt_date, $apt_time);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0){
            echo "existed";
        }else{
            $query2 = "INSERT INTO tbl_appointment 
            (account_id, specialty_id, doctor_acc_id, appointment_date, appointment_time)
            VALUES(?, ?, ?, ?, ?)";
            $stmt2 = $conn->prepare($query2);
            $stmt2->bind_param("iiiss", $account_id, $specialty_id, $doctor_id, $apt_date, $apt_time);
            $stmt2->execute();
        }
    }

?>