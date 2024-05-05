<?php 
    session_start();
    unset($_SESSION["doctor_id"]);
?>

<script>
    localStorage.removeItem("doctorDetails");
    window.location.href =  "../CLIENT SIDE/landing_page.php";
</script>