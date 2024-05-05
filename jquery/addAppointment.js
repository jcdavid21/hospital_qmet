$(document).ready(()=>{
    $(".btn-sched").on("click", function(){
        const invalid = document.querySelector(".invalid");
        const specialty_id = $("#sel-categ").val();
        const doctor_id = $("#sel-doctor").val();
        const apt_date = $("#date").val();
        const apt_time = $("#sel-time").val();
        
        if(specialty_id && doctor_id && apt_date && apt_time){
            $.ajax({
                url: "../backend/patient/addAppointment.php",
                method: "post",
                data:{
                    specialty_id, 
                    doctor_id,
                    apt_date,
                    apt_time
                },
                success: function(response){
                    if(response === "existed"){
                        invalid.innerText = "You still have pending appointment on this category.";
                        invalid.style.opacity = "1";
                    }else{
                        alert("Appointment Schedule Added!");
                        window.location.href = "./Schedule_Appointment.php";
                    }
                },
                error: function(){
                    alert("Connection Error");
                }
            })
        }else{
            invalid.innerText = "Please complete the form.";
            invalid.style.opacity = "1";
        }
    })
})