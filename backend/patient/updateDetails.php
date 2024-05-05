<?php

    require_once("../config/db.php");
    session_start();

    if(isset($_POST["first_name"]) && isset($_POST["last_name"]) && isset($_POST["address"])
    && isset($_POST["contact"]) && isset($_POST["birth_date"]) && isset($_POST["email"]))
    {
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $address = $_POST["address"];
        $contact = $_POST["contact"];
        $birth_date = $_POST["birth_date"];
        $email = $_POST["email"];
        $account_id = $_SESSION["patient_id"];

        $query =  "UPDATE tbl_account_details 
        SET first_name = ?, last_name = ?, address = ?, contact = ?, birth_date = ?
        WHERE account_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssssi", $first_name, $last_name, $address, $contact, $birth_date, $account_id);
        $stmt->execute();
        echo "success";
    }


?>