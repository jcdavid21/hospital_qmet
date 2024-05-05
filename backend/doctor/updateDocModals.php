<?php 

    require_once("../config/db.php");

    if(isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["email"])
    && isset($_POST["address"]) && isset($_POST["contact"]) && isset($_POST["account_id"]))
    {
        $first_name = $_POST["fname"];
        $last_name = $_POST["lname"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        $contact = $_POST["contact"];
        $account_id = $_POST["account_id"];

        $query = "SELECT * FROM tbl_account WHERE acc_email = ? AND account_id != ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("si", $email, $account_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0){
            echo "existed";
        }else{
            $query1 =  "UPDATE tbl_account_details 
            SET first_name = ?, last_name = ?, address = ?, contact = ?
            WHERE account_id = ?";
            $stmt1 = $conn->prepare($query1);
            $stmt1->bind_param("ssssi", $first_name, $last_name, $address, $contact, $account_id);
            $stmt1->execute();

            $query3 = "UPDATE tbl_account SET acc_email = ?
            WHERE account_id = ?";
            $stmt3 = $conn->prepare($query3);
            $stmt3->bind_param("si", $email, $account_id);
            $stmt3->execute();
        }
        echo "success";
    }

?>