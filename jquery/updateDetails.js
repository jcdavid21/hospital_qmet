$(document).ready(() => {
    $('#update').on('click', function(e) {
        e.preventDefault();
        const first_name = $("#fname").val();
        const last_name = $("#lname").val();
        const address = $("#address").val();
        const contact = $("#contact").val();
        const birth_date = $("#birthdate").val();
        const email = $("#email").val();

        // Function to validate birth date
        function validateBirthDate(birthDate) {
            const today = new Date();
            const birthDateObj = new Date(birthDate);
            const eightYearsAgo = new Date();
            eightYearsAgo.setFullYear(today.getFullYear() - 8);
        
            return birthDateObj <= eightYearsAgo;
        }

        if (first_name && last_name && address && contact && birth_date && email) {
            if (!validateBirthDate(birth_date)) {
                alert("Birth date must be before today and at least 8 years ago.");
            }else if (contact.length !== 11) {
                alert('Contact number must be exactly 11 digits long.');
            }  else {
                $.ajax({
                    url: "../backend/patient/updateDetails.php",
                    method: "post",
                    data: {
                        first_name,
                        last_name,
                        address,
                        contact,
                        birth_date,
                        email,
                    },
                    success: function(response) {
                        localStorage.setItem("patientDetails", response);
                        window.location.href = "./patient_lading_page.php";
                    },
                    error: function() {
                        console.log("Connection Error");
                    }
                });
            }
        } else {
            alert("Please complete the form.");
        }
    });
});
