<?php 
    session_start();
    unset($_SESSION["patient_id"]);
?>

<script>
    localStorage.removeItem("patientDetails");
    window.location.href =  "../index.php";
</script>