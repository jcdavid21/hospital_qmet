<?php 
    session_start();
    unset($_SESSION["patient_id"]);
?>

<script>
    localStorage.removeItem("patientDetails");
    window.location.href =  "./landing_page.php";
</script>