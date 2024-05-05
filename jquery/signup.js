$(document).ready(()=>{
    $('#register').on('click', function(e){
        e.preventDefault();
        const invalid = document.querySelector(".invalid");
        const first_name = $("#fname").val();
        const last_name = $("#lname").val();
        const address = $("#address").val();
        const contact = $("#contact").val();
        const birth_date = $("#birthdate").val();
        const email = $("#email").val();
        const password = $("#password").val();
        const confirmPass = $("#confirmPass").val();
        console.log(first_name + last_name + address + contact + birth_date + email + password + confirmPass)

        if(first_name && last_name && address && contact
        && birth_date && email && password && confirmPass)
        {
            if(password === confirmPass)
            {
                $.ajax({
                    url: "../backend/patient/signup.php",
                    method: "post",
                    data:{
                        first_name,
                        last_name,
                        address,
                        contact,
                        birth_date,
                        email,
                        password
                    },
                    success: function(response){
                        if(response === "existed")
                        {
                            invalid.innerText = "Email address already exist.";
                            invalid.style.opacity = "1";
                        }else{
                            alert("Registered Successfully");
                            window.location.href = "login_Signin.php";
                        }
                    },
                    error: function(){
                        console.log("Connection Error");
                    }
                })
            }else{
                invalid.innerText = "Invalid Password";
                invalid.style.opacity = "1";
            }
        }else{
            alert("Please complete the form.");
        }
    })
})