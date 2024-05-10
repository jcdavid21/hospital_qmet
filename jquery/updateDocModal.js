$(document).ready(() => {
    $(".update").on("click", function(){
        const fname = $(this).closest(".modal-content").find(".fname").val();
        const lname = $(this).closest(".modal-content").find(".lname").val();
        const email = $(this).closest(".modal-content").find(".email").val();
        const address = $(this).closest(".modal-content").find(".address").val();
        const contact = $(this).closest(".modal-content").find(".contact").val();
        const account_id = $(this).val();

        // Function to validate contact number
        function validateContact(contact) {
            return contact.length === 11;
        }

        if(fname && lname && email && address && contact && account_id){
            if (!validateContact(contact)) {
                alert("Contact number must be exactly 11 digits long.");
                return;
            }

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
                    console.log("Error occurred");
                }
            })
        }else{
            alert("Please complete the form.");
        }
    })
})
