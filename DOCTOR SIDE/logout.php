<?php 
    session_start();
    unset($_SESSION["doctor_id"]);
?>

<script>
    localStorage.removeItem("doctorDetails");
    window.location.href =  "../index.php";
</script>