$(document).ready(function(){
    $("#login").on("click", function(e){
        e.preventDefault();
        const invalid = document.querySelector(".invalid");
        const email = $("#email").val();
        const password = $("#password").val();

        if(email && password){
            $.ajax({
                url: "../backend/patient/login.php",
                method: "post",
                data:{
                    email,
                    password
                },
                success: function(response){
                    if(response === "invalid"){
                        invalid.innerText = "Invalid email or password";
                        invalid.style.opacity = "1";
                    }else{
                        alert("Log in successfully");
                        const data = JSON.parse(response);
                        if(data.role_id == 1){
                            localStorage.setItem("patientDetails", response);
                            window.location.href = "./patient_lading_page.php";
                        }else if(data.role_id == 2){
                            localStorage.setItem("doctorDetails", response);
                            window.location.href = "../DOCTOR SIDE/DoctorDashboard.php";
                        }else if(data.role_id == 3){
                            localStorage.setItem("adminDetails", response);
                            window.location.href = "../ADMIN SIDE/index.php";
                        }
                    }
                },
                error: function(){
                    alert("Connection Error");
                }
            })
        }else{
            invalid.innerText = "Empty email or password!";
            invalid.style.opacity = "1";
        }
    })
})