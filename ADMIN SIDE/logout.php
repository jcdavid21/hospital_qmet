<?php 
    session_start();
    unset($_SESSION["hospi_admin_id"]);
?>

<script>
    localStorage.removeItem("adminDetails");
    window.location.href =  "../CLIENT SIDE/landing_page.php";
</script>