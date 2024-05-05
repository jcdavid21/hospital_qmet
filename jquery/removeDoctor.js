$(document).ready(()=>{
    $('.remove').on("click", function(){
        const account_id = $(this).val();
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
          }).then((result) => {
            if (result.isConfirmed) {
                if(account_id){
                    $.ajax({
                        url: "../backend/doctor/removeDoctor.php",
                        method: "post",
                        data:{
                            account_id
                        },
                        success: function(response){
                            if(response === "success"){
                                window.location.href = "./doctors.php";
                            }
                        },
                        error: function(){
                            alert("Connection Error");
                        }
                    })
                }
            }
          });
        
    })
})