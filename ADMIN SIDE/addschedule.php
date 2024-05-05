<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Schedule</title>
    <link rel="icon" type="image/x-icon" href="logo.png">
    <style type="text/css">
        
        html, body {
            overflow: hidden; /* Prevent scrolling beyond viewport */
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f2f2f2;
            font-family: sans-serif;
            background-color: #133C7A;
        }

        .container {
            width: 30%;
            padding: 40px;
            background-color: #3A7DE0;
            box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.3);
        }

        .container p {
            margin: 0 0 10px 0;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 18px;
        }

        .container input[type="text"],
        .container input[type="password"],
        .container input[type="number"],
        .container input[type="date"],
        .container input[type="time"],
        .container select {
            width: 80%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 5px;
            border: 1px solid #ccc;
            border-radius: 0px;
            box-sizing: border-box;
        }

        .container button {
            background-color: #091E3D;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
            padding: 15px;
            border-radius: 5px;
            border: none;
            width: 30%;
            margin: 0 auto;
            box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.3);
        }

        .container button:hover {
            background-color: #0056b3;
        }

        .icon-container {
            position: relative;
        }

        .topleft {
            position: absolute;
            top: 20px;
            left: 20px;
        }

        .form-container {
            display: flex;

        }

        .box_1, .box_2, .box_3, .box_4 {
            flex: 1; /* Make the boxes take equal space */
            padding: 10px;
            margin: 5px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;

        }

        .line1
        {
            box-sizing: border-box;
            border-style: solid solid none solid;
            visibility: visible;

        }

        

        .line2
        {
            box-sizing: border-box;
            border-style: none solid solid solid;
            visibility: visible;
        }

       
        
    
    </style>

</head>
<body>

    <div class="container">

        <div class="line1">
        <p style="font-size: 35px; margin-top: 10px;">
            Add Schedule 
        </p>
        </div>
        <div class="line2"></div>
        
        <!-- Form Section -->
        <form action="#" id="myForm"> 
        <div id="form-container">

            <div class="box_1">
                <p>Select Doctor</p>
                <select>
                    <option></option>
                    <option></option>
                </select>
                    
            </div>

            <div class="box_2">
                
                <p>Max Booking Number</p>
                <input type="number" name="max-book">
            </div>

            <div class="box_3">
                <p>Schedule Date</p>
                <input type="date" name="sched-date">
            </div>

            <div class="box_4">

                <p>Schedule Time</p>
                <input type="time" name="sched-time">
            </div>

        </div>
        </form>
        <div class="submit-btn" style="text-align: center; margin-top: 20px;">
                <button onclick="goToClinic()">Add</button>
            </div>
        <!-- End Form Section -->
        
    </div>

</body>
</html>
