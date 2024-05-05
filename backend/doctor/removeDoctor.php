<?php 
    require_once("../config/db.php");

    if(isset($_POST["account_id"])){
        $account_id = $_POST["account_id"];
        $query1 = "DELETE FROM tbl_account WHERE account_id = ?";
        $stmt1 = $conn->prepare($query1);
        $stmt1->bind_param("i", $account_id);
        $stmt1->execute();

        $query2 = "DELETE FROM tbl_account_details WHERE account_id = ?";
        $stmt2 = $conn->prepare($query2);
        $stmt2->bind_param("i", $account_id);
        $stmt2->execute();

        $query3 = "DELETE FROM tbl_account_doctor WHERE account_id = ?";
        $stmt3 = $conn->prepare($query3);
        $stmt3->bind_param("i", $account_id);
        $stmt3->execute();

        $query4 = "DELETE FROM tbl_appointment WHERE doctor_acc_id = ?";
        $stmt4 = $conn->prepare($query4);
        $stmt4->bind_param("i", $account_id);
        $stmt4->execute();

        echo "success";
    }
    
?>