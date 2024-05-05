$(document).ready(()=>{
    $("#update").on("click", function(e){
        e.preventDefault();
        const password  = $("#password").val();
        const conpass = $("#conpass").val();
        const invalid = document.querySelector(".invalid");

        if(password && conpass){
            if(password === conpass){
                $.ajax({
                    url: "../backend/patient/changepass.php",
                    method: "post",
                    data:{
                        password
                    },
                    success: function(response){
                        if(response === "success"){
                            alert("Updated Password successfully");
                            window.location.href =  "./logout.php";
                        }
                    },
                    error: function(){
                        alert("Connection Error")
                    }
                })
            }else{
                invalid.innerText = "Invalid Password";
                invalid.style.opacity = "1";
            }
        }else{
            invalid.innerText = "Empty field!";
            invalid.style.opacity = "1";
        }
    })
})