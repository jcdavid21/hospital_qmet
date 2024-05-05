$(document).ready(()=>{
    $(".update").on("click", function(){
        const fname = $(this).closest(".modal-content").find(".fname").val();
        const lname = $(this).closest(".modal-content").find(".lname").val();
        const email = $(this).closest(".modal-content").find(".email").val();
        const address = $(this).closest(".modal-content").find(".address").val();
        const contact = $(this).closest(".modal-content").find(".contact").val();
        const account_id = $(this).val();

        if(fname && lname && email && address && contact && account_id){
            $.ajax({
                url: "../backend/doctor/updateDocModals.php",
                method: "post",
                data:{
                    fname,
                    lname,
                    email,
                    address,
                    contact,
                    account_id
                },
                success: function(response){
                    if(response === "success"){
                        window.location.href = "./doctors.php";
                    }else{
                        alert("Connection error");
                    }
                },
                error: function(){

                }
            })
        }else{
            alert("Please complete the form.");
        }
    })
})