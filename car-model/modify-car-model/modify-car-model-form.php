<html>
    <head>
        <title>
            Modify Car Model
        </title>
    </head>
    <body>
    <?php
            $conn = mysqli_connect('localhost', 'root', '', 'car_rental_system');

            if ($conn->connect_error)
                die("Connection failed<br>Connection Error: ".$conn->connect_error);

            $model_id = $_REQUEST['model_id'];
    
            $qry = "SELECT * FROM vehicle_models WHERE model_id=".$model_id;
            $res_array = mysqli_query($conn, $qry);
            $res = mysqli_fetch_array($res_array);
    ?>

        <h2><u>Modify Car Model</u></h2>
        <form action="modify-car-model.php" method="POST">
            <input type="hidden" name="model_id" value="<?php echo $model_id;?>" />
            <br><br>

            Model Id: <?php echo $res['model_id'];?>
            <br><br>

            <label for="brand_name">Brand Name: </label><input type="text" name="brand_name" id="brand_name" value="<?php echo $res['brand_name'];?>" />
            <br><br>

            <label for="model_name">Model Name: </label><input type="text" name="model_name" id="model_name" value="<?php echo $res['model_name']?>" />
            <br><br>

            <label for="vehicle_type">Vehicle Type: </label><input type="text" name="vehicle_type" id="vehicle_type" value="<?php echo $res['vehicle_type']?>" />
            <br><br>

            <label for="hour_price">Per Hour Price: </label><input type="text" name="hour_price" id="hour_price" value="<?php echo $res['hour_price']?>" />
            <br><br>

            <label for="day_price">Per Day Price: </label><input type="text" name="day_price" id="day_price" value="<?php echo $res['day_price']?>" />
            <br><br>

            <label for="week_price">Per Week Price: </label><input type="text" name="week_price" id="week_price" value="<?php echo $res['week_price']?>" />
            <br><br>

            <label for="month_price">Per Month Price: </label><input type="text" name="month_price" id="month_price" value="<?php echo $res['month_price']?>" />
            <br><br>

            <input type="submit" value="Update Model" />
        </form>
    </body>
</html>