$(document).ready(() => {
    $('.update').on('click', function(e) {
        e.preventDefault();
        const invalid = document.querySelector(".invalid");
        const formData = new FormData();
        const profile = $("#input-file")[0].files[0]; 
        console.log(profile)
        formData.append('profile', profile);
        formData.append('first_name', $("#fname").val());
        formData.append('last_name', $("#lname").val());
        formData.append('address', $("#address").val());
        formData.append('contact', $("#contact").val());
        formData.append('birth_date', $("#birthdate").val());
        formData.append('email', $("#email").val());
        formData.append('password', $("#password").val());
        formData.append('confirmPass', $("#confirmPass").val());

        // Function to validate contact number
        function validateContact(contact) {
            return contact.length === 11;
        }

        // Function to validate birth date
        function validateBirthDate(birthDate) {
            const today = new Date();
            const birthDateObj = new Date(birthDate);
            const eightYearsAgo = new Date();
            eightYearsAgo.setFullYear(today.getFullYear() - 8);
        
            return birthDateObj <= eightYearsAgo;
        }

        if (formData.get('first_name') && formData.get('last_name') && formData.get('address') && formData.get('contact') && formData.get('birth_date') && formData.get('email') && formData.get('password') && formData.get('confirmPass') && formData.get('profile')) {
            if (formData.get('password') === formData.get('confirmPass')) {
                if (!validateContact(formData.get('contact'))) {
                    invalid.innerText = "Contact number must be exactly 11 digits long.";
                    invalid.style.opacity = "1";
                    return;
                }
                if (!validateBirthDate(formData.get('birth_date'))) {
                    invalid.innerText = "Birth date must be before today and at least 8 years ago.";
                    invalid.style.opacity = "1";
                    return;
                }

                $.ajax({
                    url: "../backend/doctor/updateDetails.php",
                    method: "post",
                    data: formData,
                    processData: false, 
                    contentType: false, 
                    success: function(response) {
                        if (response === "existed") {
                            invalid.innerText = "Email address already exists.";
                            invalid.style.opacity = "1";
                        } else if(response === "error_uploading"){
                            alert("Error upload");
                        }else {
                            alert("Updated Successfully");
                            window.location.href = "./DoctorDashboard.php";
                        }
                    },
                    error: function() {
                        console.log("Connection Error");
                    }
                })
            } else {
                invalid.innerText = "Passwords do not match.";
                invalid.style.opacity = "1";
            }
        } else {
            alert("Please complete the form.");
        }
    })
})
