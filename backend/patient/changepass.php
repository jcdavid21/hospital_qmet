<?php 
    
    require_once("../config/db.php");
    session_start();

    if(isset($_POST["password"])){

        $account_id = $_SESSION["patient_id"];
        $password = $_POST["password"];

        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $query = "UPDATE tbl_account 
        SET acc_password  = ?
        WHERE account_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("si", $hashed_password, $account_id);
        $stmt->execute();
        echo "success";
    }

?>
