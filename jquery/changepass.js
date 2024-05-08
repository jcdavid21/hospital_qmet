$(document).ready(() => {
    $("#update").on("click", function(e) {
        e.preventDefault();
        const password = $("#password").val();
        const conpass = $("#conpass").val();
        const invalid = document.querySelector(".invalid");

        // Function to validate password complexity
        function validatePassword(password) {
            const regex = /^(?=.*[A-Z])(?=.*[!@#$%^&*])(?=.{8,})/;
            return regex.test(password);
        }

        if (password && conpass) {
            if (password === conpass) {
                if (!validatePassword(password)) {
                    invalid.innerText = "Password must contain at least 1 uppercase letter, 1 special character, and be at least 8 characters long.";
                    invalid.style.opacity = "1";
                } else {
                    $.ajax({
                        url: "../backend/patient/changepass.php",
                        method: "post",
                        data: {
                            password
                        },
                        success: function(response) {
                            if (response === "success") {
                                alert("Updated Password successfully");
                                window.location.href = "./logout.php";
                            }
                        },
                        error: function() {
                            alert("Connection Error");
                        }
                    });
                }
            } else {
                invalid.innerText = "Passwords do not match.";
                invalid.style.opacity = "1";
            }
        } else {
            invalid.innerText = "Empty field!";
            invalid.style.opacity = "1";
        }
    });
});
