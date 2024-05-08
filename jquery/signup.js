$(document).ready(() => {
    $('#register').on('click', function(e) {
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
        console.log(first_name + last_name + address + contact + birth_date + email + password + confirmPass);

        // Function to validate password complexity
        function validatePassword(password) {
            const regex = /^(?=.*[A-Z])(?=.*[!@#$%^&*])(?=.{8,})/;
            return regex.test(password);
        }

        // Function to validate birth date
        function validateBirthDate(birthDate) {
            const today = new Date();
            const birthDateObj = new Date(birthDate);
            const minDate = new Date();
            minDate.setFullYear(minDate.getFullYear() - 8); // At least 8 years gap

            return birthDateObj < today && birthDateObj >= minDate;
        }

        if (first_name && last_name && address && contact && birth_date && email && password && confirmPass) {
            if (password === confirmPass) {
                if (!validatePassword(password)) {
                    invalid.innerText = "Password must contain at least 1 uppercase letter, 1 special character, and be at least 8 characters long.";
                    invalid.style.opacity = "1";
                } else if (!validateBirthDate(birth_date)) {
                    invalid.innerText = "Birth date must be before today and at least 8 years ago.";
                    invalid.style.opacity = "1";
                } else {
                    $.ajax({
                        url: "../backend/patient/signup.php",
                        method: "post",
                        data: {
                            first_name,
                            last_name,
                            address,
                            contact,
                            birth_date,
                            email,
                            password
                        },
                        success: function(response) {
                            if (response === "existed") {
                                invalid.innerText = "Email address already exists.";
                                invalid.style.opacity = "1";
                            } else {
                                alert("Registered Successfully");
                                window.location.href = "login_Signin.php";
                            }
                        },
                        error: function() {
                            console.log("Connection Error");
                        }
                    });
                }
            } else {
                invalid.innerText = "Passwords do not match.";
                invalid.style.opacity = "1";
            }
        } else {
            alert("Please complete the form.");
        }
    });
});
