<?php require_once("../backend/config/db.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./addDoctor.css">
    <link rel="icon" type="image/x-icon" href="logo.png">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Add Doctor</title>
</head>
<body>
    <div class="center" style="height: 100%;">
        <div class="con">
            <div class="center column">
                <h1>Add Doctor Details</h1>
                <div class="img-con">
                    <img src="./doctor.png" alt="">
                </div>
                <input type="file" id="profile">
            </div>
            <form>
                <div class="con-details">
                    <div class="label">Name:</div>
                    <div class="input-flex">
                        <input type="text" id="fname" placeholder="First Name">
                        <input type="text" id="lname" placeholder="Last Name">
                    </div>
                </div>
                
                <div class="con-dateils">
                    <div class="label">Email: </div>
                    <input type="email" id="email" placeholder="Email Address">
                </div>

                <div class="con-dateils">
                    <div class="label">Address: </div>
                    <input type="text" id="address" placeholder="Complete Address">
                </div>

                <div class="con-dateils">
                    <div class="label">Password: </div>
                    <input type="password" id="password" placeholder="Password">
                </div>

                <div class="con-dateils">
                    <div class="label">Date of Birth: </div>
                    <input type="date" id="birthdate">
                </div>

                <div class="con-dateils">
                    <div class="label">Confirm Password: </div>
                    <input type="password" id="confirmPass" placeholder="Confirm Password">
                </div>
                    
                <div class="con-dateils">
                    <div class="label">Contact Number: </div>
                    <input type="number" id="contact" placeholder="Phone Number">
                </div>
                <div class="con-dateils">
                    <div class="label">Specialty: </div>
                    <select name="specialty" id="specialty">
                        <?php 
                            $query = "SELECT * FROM tbl_specialty";
                            $stmt = $conn->prepare($query);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            while($data = $result->fetch_assoc()){
                        ?>
                            <option value="<?php echo $data["specialty_id"]; ?>">
                                <?php echo $data["specialty_name"]; ?>
                            </option>
                        <?php }?>
                    </select>
                </div>
                <div class="invalid">Invalid</div>

                <div class="button">
                    <button id="add">Add Doctor</button>
                </div>
            </form>

        </div>
    </div>
    <script src="../jquery/addDoctor.js"></script>
</body>
</html>