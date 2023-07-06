<html>
    <head>
        <title>
            Modify User
        </title>
    </head>
    <body>
        <?php
                $conn = mysqli_connect('localhost', 'root', '', 'car_rental_system');

                if ($conn->connect_error)
                    die("Connection failed<br>Connection Error: ".$conn->connect_error);

                $username = $_REQUEST['username'];
                
                $qry = "SELECT * FROM user_details LEFT JOIN user_emails ON user_details.username = user_emails.username 
                        LEFT JOIN user_phone_numbers ON user_details.username = user_phone_numbers.username";
                
                $res_array = mysqli_query($conn, $qry);
                $res = mysqli_fetch_array($res_array);
        ?>
        <h2><u>Modify User</u></h2>
        <form action="modify-user.php" method="POST">
            <input type="hidden" name="username" value="<?php echo $username;?>" />
            <br><br>

            <label for="registration number">Registration Number: </label><input type="text" name="registration_number" id="registration_number" value="<?php echo $res['registration_number'];?>" />
            <br><br>

            <!--
            <label for="brand name">Brand Name: </label><input type="text" name="brand_name" id="brand_name" value="<?php echo $res['brand_name'];?>" />
            <br><br>

            <label for="model name">Model Name: </label><input type="text" name="model_name" id="model_name" value="<?php echo $res['model_name'];?>" />
            <br><br>
            
            <label for="engine number">Engine Number: </label><input type="text" name="engine_number" id="engine_number" value="<?php echo $res['engine_number'];?>" />
            <br><br>-->

            <label for="vehicle color">Vehicle Color: </label><input type="text" name="vehicle_color" id="vehicle_color" value="<?php echo $res['vehicle_color'];?>" />
            <br><br>

            <label for="is_booked">Booking Status: </label><input type="text" name="is_booked" id="is_booked" value="<?php echo $res['is_booked'];?>" />
            <br><br>

            <label for="model id">Model Id: </label><input type="text" name="model_id" id="model_id" value="<?php echo $res['model_id'];?>" />
            <br><br>

            <input type="submit" value="Modify Vehicle" />
        </form>
    </body>
</html>