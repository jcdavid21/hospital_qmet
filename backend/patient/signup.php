<?php

require_once("../config/db.php");
session_start();

if (
    $_POST["first_name"] && $_POST["last_name"] && $_POST["address"] &&
    $_POST["contact"] && $_POST["birth_date"] && $_POST["email"] && $_POST["password"]
) {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $address = $_POST["address"];
    $contact = $_POST["contact"];
    $birth_date = $_POST["birth_date"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role_id = 1;

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $query = "SELECT * FROM tbl_account WHERE acc_email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "existed";
    } else {
        $query2 = "INSERT INTO tbl_account (acc_email, acc_password, role_id)
            VALUES(?, ?, ?)";
        $stmt2 = $conn->prepare($query2);
        $stmt2->bind_param("ssi", $email, $hashed_password, $role_id);
        $stmt2->execute();

        $account_id = $stmt2->insert_id;

        $query3 = "INSERT INTO tbl_account_details (account_id, first_name, last_name, contact, address, birth_date)
            VALUES(?, ?, ?, ?, ?, ?)";
        $stmt3 = $conn->prepare($query3);
        $stmt3->bind_param("isssss", $account_id, $first_name, $last_name, $contact, $address, $birth_date);
        $stmt3->execute();
    }
}

?>
