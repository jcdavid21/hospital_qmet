$(document).ready(()=>{
    $('.remove').on('click', function(){
        const appointment_id = $(this).val();
        if(appointment_id){
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
              }).then((result)=>{
                if(result.isConfirmed){
                    $.ajax({
                        url: "../backend/doctor/removeApt.php",
                        method: "post",
                        data:{
                            appointment_id
                        },
                        success: function(response){
                            if(response === "success"){
                                window.location.href = "./appointments.php";
                            }
                        },
                        error: function(){
                            alert("Connection Error");
                        }
                    })
                }
              })
            
        }
    })
})