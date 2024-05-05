$(document).ready(()=>{
    $(".update").on("click", function(){
        const appointment_id = $(this).val();
       if(appointment_id){
        $.ajax({
            url: "../backend/doctor/updateStatus.php",
            method: "post",
            data:{
                appointment_id
            },
            success: function(response){
                if(response === "success"){
                    window.location.href = "./DoctorSessions.php";
                }
            },
            error: function(){
                alert("Connection Error!");
            }
        })
       }else{
        alert("No ID!");
       }
    })
})