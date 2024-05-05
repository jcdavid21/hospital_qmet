$(document).ready(()=>{
    $('.add-specialty').on('click', function(e){
        e.preventDefault();
        const specialty_name = $(this).closest('.modal-content').find('#specialty-name').val();
        if(specialty_name){
            $.ajax({
                url: "../backend/doctor/addSpecialty.php",
                method: "post",
                data:{
                    specialty_name
                },
                success: function(response){
                    if(response === "success"){
                        window.location.href = "./doctors.php";
                    }else if(response === 'existed'){
                        alert("Specialty name already exist!");
                    }
                },
                error: function(){
                    alert("Connection Error");
                }
            })
        }
    })
})

// $(document).ready(()=>{
//     $('.remove-specialty').on('click', function(){
//         const specialty_id = $(this).val();
//     })
// })