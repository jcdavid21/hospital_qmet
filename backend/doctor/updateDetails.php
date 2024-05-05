<?php

require_once("../config/db.php");
session_start();

if (
    isset($_POST["first_name"]) && isset($_POST["last_name"]) && isset($_POST["address"])
    && isset($_POST["contact"]) && isset($_POST["birth_date"]) && isset($_POST["email"])
    && isset($_POST["password"]) && isset($_FILES["profile"])
) {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $address = $_POST["address"];
    $contact = $_POST["contact"];
    $birth_date = $_POST["birth_date"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $account_id = $_SESSION["doctor_id"];

    // Handle file upload
    $profile_tmp_name = $_FILES["profile"]["tmp_name"];
    $profile_name = $_FILES["profile"]["name"];
    $profile_destination = "../../ADMIN SIDE/profile/" . $profile_name; // Concatenate the file name to the destination folder

    
    if (move_uploaded_file($profile_tmp_name, $profile_destination)) {
        

        $query2 = "SELECT * FROM tbl_account WHERE acc_email = ? AND account_id != ?";
        $stmt2 = $conn->prepare($query2);
        $stmt2->bind_param("si", $email, $account_id);
        $stmt2->execute();
        $result = $stmt2->get_result();
        if($result->num_rows > 0){
            echo "existed";
        }else{
            $query =  "UPDATE tbl_account_details 
            SET first_name = ?, last_name = ?, address = ?, contact = ?, birth_date = ?
            WHERE account_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("sssssi", $first_name, $last_name, $address, $contact, $birth_date, $account_id);
            $stmt->execute();

            $query3 = "UPDATE tbl_account SET acc_email = ?, acc_password  = ?
            WHERE account_id = ?";
            $stmt3 = $conn->prepare($query3);
            $stmt3->bind_param("ssi", $email, $password, $account_id);
            $stmt3->execute();

            $query4 = "UPDATE tbl_account_doctor SET profile_img = ? WHERE account_id = ?";
            $stmt4 = $conn->prepare($query4);
            $stmt4->bind_param("si",  $profile_name, $account_id);
            $stmt4->execute();
        }
        echo "success";
    } else {
        echo "error_uploading";
    }
}
?>
