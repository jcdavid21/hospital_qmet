<?php

require_once("../config/db.php");
session_start();

if (
    isset($_POST["first_name"]) && isset($_POST["last_name"]) && isset($_POST["address"])
    && isset($_POST["contact"]) && isset($_POST["birth_date"]) && isset($_POST["email"])
    && isset($_POST["password"]) && isset($_POST["specialty"]) && isset($_FILES["profile"])
) {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $address = $_POST["address"];
    $contact = $_POST["contact"];
    $birth_date = $_POST["birth_date"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $specialty = $_POST["specialty"];
    $role_id = 2;
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);


    // Handle file upload
    $profile_tmp_name = $_FILES["profile"]["tmp_name"];
    $profile_name = $_FILES["profile"]["name"];
    $profile_destination = "../../ADMIN SIDE/profile/" . $profile_name; // Concatenate the file name to the destination folder

    
    if (move_uploaded_file($profile_tmp_name, $profile_destination)) {
        $query = "SELECT * FROM tbl_account WHERE acc_email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "existed";
        } else {
            $query2 = "INSERT INTO tbl_account (acc_email, acc_password, role_id) VALUES (?, ?, ?)";
            $stmt2 = $conn->prepare($query2);
            $stmt2->bind_param("ssi", $email, $hashed_password, $role_id);
            $stmt2->execute();

            $account_id = $stmt2->insert_id;

            $query3 = "INSERT INTO tbl_account_details (account_id, first_name, last_name, contact, address, birth_date) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt3 = $conn->prepare($query3);
            $stmt3->bind_param("isssss", $account_id, $first_name, $last_name, $contact, $address, $birth_date);
            $stmt3->execute();

            $query4 = "INSERT INTO tbl_account_doctor (account_id, profile_img, specialty_id) VALUES (?, ?, ?)";
            $stmt4 = $conn->prepare($query4);
            $stmt4->bind_param("ssi", $account_id, $profile_name, $specialty);
            $stmt4->execute();
            echo "success";
            exit();
        }
        
    } else {
        echo "error_uploading";
    }
}else{
    echo "error_uploading";
}
?>
