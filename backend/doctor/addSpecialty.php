<?php 

    require_once("../config/db.php");

    if(isset($_POST["specialty_name"])){
        $specialty_name = $_POST["specialty_name"];
        $check  = TRUE;

        $query1 = "SELECT * FROM tbl_specialty";
        $stmt1 = $conn->prepare($query1);
        $stmt1->execute();
        $result = $stmt1->get_result();
        while($data = $result->fetch_assoc()){
            if(strtolower($data['specialty_name']) == strtolower($specialty_name)){
                $check = FALSE;
            }
        }


        if($check){
            $query = "INSERT INTO tbl_specialty (specialty_name)
            VALUES (?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $specialty_name);
            $stmt->execute();
            echo "success";
        }else{
            echo "existed";
        }
    }
?>