<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Password</title>
    <link rel="icon" type="image/x-icon" href="logo.png">
    <style type="text/css">
        
        *
        {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            box-sizing: border-box;

        }

        .container
        {
            width: 100%;
            height: 100vh;
            background: #133C7A;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .inner-container
        {
            width: 80em;
            background-color: #3A7DE0;
            padding: 10px;
            text-align: center;
            color: black;
        }

        .inner-container h1
        {
            font-size: 22px;
        }

        .inner-container img
        {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin-top: 20px;
            margin-bottom: 10px;
            background: white;
        }

        label[for = "input-file"]
        {
            display: block;
            width: 200px;
            background-color: #091E3D;
            color: #fff;
            padding: 12px;
            margin: 10px auto;
            cursor: pointer;
        }

        input[type = "file"] 
        {
            color: transparent;
            display: none;
        }

        ::-webkit-scrollbar {
            width: 5px;
            background-color: transparent;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background-color: rgba(0, 0, 0, 0);
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background-color: #504B3A;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        .credential-box
        {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            width: 100%; /* Adjusted width */
            margin-top: 20px; /* Added margin-top */
        }

        .left-section
        {
            flex: 1; /* Added flex property */
            padding: 20px; /* Added padding */
            display: flex;
            flex-direction: column;
        }   

        .right-section
        {
           
            flex: 1; /* Added flex property */
            padding: 20px; /* Added padding */
            display: flex;
            flex-direction: column;
        }   

        .left-section label,
        .right-section label 
        {
            text-align: left;
            display: block;
            margin-top: 5px; /* Optional: Adjust margin between labels */
            margin-left: 20px;
        }

        .right-section button 
        {
            margin-top: 50px;
            position: absolute;
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -0%);
            width: 200px;
            background-color: transparent; /* Set background color to transparent */
            color: #091E3D; /* Set text color */
            border: 2px solid #091E3D; /* Add border */
            font-size: 15px;
            padding: 10px 20px; /* Adjust padding */
            cursor: pointer;
            transition: background-color 0.3s ease; /* Add smooth transition */
        }

        .right-section button:hover 
        {
            background-color: #091E3D; /* Change background color on hover */
            color: #fff; /* Change text color on hover */
        }

        .right-section span 
        {
            font-size: 16px; /* Adjust font size */
        }


        input[type="text"]
        , input[type="address"]
        , input[type="date"]
        , input[type="number"]
        , input[type="email"]
        , input[type="password"]
        {
            width: calc(100% - 45px);
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 5px;
            margin-left: 20px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 0px;
            justify-content: center;
            align-items: center;
            display: flex;
        }

    </style>

</head>
<body>

   <div class="container">
        <div class="inner-container">
          <h1>Add a Doctor</h1> 
          <img src="doctor.png" id = "profile-pic">
          <label for="input-file">Add Image</label>
          <input id = "input-file" type="file" accept="image/jpeg, image/png, image/jpg">
        
        
        <div class="credential-box">
            <div class="left-section">
                
                <label for = "name">Name: </label>
                <input type="text" name="fname" placeholder="First Name">
                <input type="text" name="lname" placeholder="Last Name">

                <label for="address">Address:</label>
                <input type="address" name="bahay" placeholder="Address">

                <label for="date-of-birth">Date of birth:</label>
                <input type="date" name="dobirt" placeholder="Date of Birth">

                <label for="phone">Contact Number:</label>
                <input type="number" name="bahay" placeholder="Active Contact Number">

            </div>

            <div class="right-section">
                
                <label for = "name">Email: </label>
                <input type="email" name="email" placeholder="Email">

                <label for="passord">Password:</label>
                <input type="password" name="pass" placeholder="Password">

                <label for="cpassword">Confirm Password:</label>
                <input type="password" name="cpass" placeholder="Confirm Password">

                <div>
                    
                    <button>Add Doctor</button>

                </div>

            </div>
        </div>

        </div>
   </div>

<script type="text/javascript">
    let profilePic = document.getElementById("profile-pic");
    let inputFile = document.getElementById("input-file");

    inputFile.onchange = function()
    {
        profilePic.src = URL.createObjectURL(inputFile.files[0]); //for selecting image
    }
</script>

</body>
</html>
