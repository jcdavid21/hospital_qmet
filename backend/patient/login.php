<?php 
    
    require_once("../config/db.php");
    session_start();

    if(isset($_POST["email"]) && isset($_POST["password"]))
    {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $query = "SELECT ta.account_id, ta.acc_email, ta.acc_password, ta.role_id, 
        CONCAT(td.first_name, ' ', td.last_name) AS full_name, 
        td.address, td.contact, td.birth_date, tr.role_name 
        FROM tbl_account ta 
        INNER JOIN tbl_account_details td ON td.account_id = ta.account_id 
        INNER JOIN tbl_role tr ON tr.role_id = ta.role_id WHERE ta.acc_email = ?";

        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0){
            $data = $result->fetch_assoc();
            $hashed_password = $data["acc_password"];
            if(password_verify($password, $hashed_password)){
                $role_id = $data["role_id"];
                $sessionData = array(
                    "account_id" => $data["account_id"],
                    "role_id" => $data["role_id"],
                    "full_name" =>  $data["full_name"],
                    "email" => $data["acc_email"],
                    "full_name" => $data["full_name"],
                    "contact" => $data["contact"],
                    "birth_date" => $data["birth_date"],
                    "address" => $data["address"],
                    "role_name" => $data["role_name"]
                );
                if($role_id == 1){
                    $_SESSION["patient_id"] = $data["account_id"];
                }else if($role_id == 2){
                    $_SESSION["doctor_id"] = $data["account_id"];
                }else if($role_id == 3){
                    $_SESSION["hospi_admin_id"] = $data["account_id"];
                }
                echo json_encode($sessionData);
            }else{
                echo "invalid";
            }
        }else{
            echo "invalid";
        }
    }

?>
