$(document).ready(()=>{
    $('#update').on('click', function(e){
        e.preventDefault();
        const first_name = $("#fname").val();
        const last_name = $("#lname").val();
        const address = $("#address").val();
        const contact = $("#contact").val();
        const birth_date = $("#birthdate").val();
        const email = $("#email").val();

        if(first_name && last_name && address && contact
        && birth_date && email)
        {
    
            $.ajax({
                url: "../backend/patient/updateDetails.php",
                method: "post",
                data:{
                    first_name,
                    last_name,
                    address,
                    contact,
                    birth_date,
                    email,
                },
                success: function(response){
                    if(response === "success")
                    {
                        alert("Updated Successfully");
                        window.location.href = "./logout.php";
                    }
                },
                error: function(){
                    console.log("Connection Error");
                }
            })
        }else{
            alert("Please complete the form.");
        }
    })
})