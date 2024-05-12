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

    $query = "SELECT ta.account_id, ta.acc_email, ta.acc_password, ta.role_id, 
    CONCAT(td.first_name, ' ', td.last_name) AS full_name, 
    td.address, td.contact, td.birth_date, tr.role_name 
    FROM tbl_account ta 
    INNER JOIN tbl_account_details td ON td.account_id = ta.account_id 
    INNER JOIN tbl_role tr ON tr.role_id = ta.role_id WHERE ta.account_id = ?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $account_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc(); // Fetch data from the result

    // Store fetched data in sessionData array
    $sessionData = array(
        "account_id" => $data["account_id"],
        "role_id" => $data["role_id"],
        "full_name" =>  $data["full_name"],
        "email" => $data["acc_email"],
        "contact" => $data["contact"],
        "birth_date" => $data["birth_date"],
        "address" => $data["address"],
        "role_name" => $data["role_name"]
    );

    echo json_encode($sessionData);
}
?>
