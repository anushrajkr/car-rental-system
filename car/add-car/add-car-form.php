<html>
    <head>
        <title>
            Add Car
        </title>
        <script type="text/javascript">
            var xhr = new XMLHttpRequest();
            var data;
            var model_data = {};
            
            xhr.open('POST', '/car-rental-system/car/add-car/get-model-data.php');
            xhr.send();

            xhr.onload = function () {
                data = JSON.parse(xhr.response);
            }

            function selectModels()
            {
                var model_select_box = document.getElementById("model_name");
                model_select_box.disabled = 0;

                var brand_name = document.getElementById("brand_name").value;
                var model_data = data[brand_name];

                while (model_select_box.firstChild)
                    model_select_box.removeChild(model_select_box.firstChild);

                for (var model_number in model_data)
                {
                    var model_option = document.createElement("option");
                    model_option.id = model_option.value = model_data[model_number];
                    model_option.innerText = model_data[model_number];
                    model_select_box.appendChild(model_option);
                }
            }
        </script>
    </head>
    <?php
        session_start();

        if (!isset($_SESSION['login_admin']))
        {
            header("location:/car-rental-system/admin/admin-login/admin-login.php");
            exit;
        }
    ?>
    <body>
        <h2><u>Add Car</u></h2>
        <?php
            session_start();

            if (!isset($_SESSION['login_admin']))
            {
                header("location:/car-rental-system/admin/admin-login/admin-login.php");
                exit;
            }
        
            $conn = mysqli_connect('localhost', 'root', '', 'car_rental_system');
        
            if ($conn->connect_error)
                die("Connection error".$conn->connect_error);

            $qry = "SELECT brand_name FROM vehicle_models";
            $res_array = mysqli_query($conn, $qry);

            echo '
                <form action="add-car-script.php" method="POST">
                    <label for="brand name">Brand Name: </label>
                    <select name="brand_name" id="brand_name" onchange="selectModels()">      
            ';

            while ($res = mysqli_fetch_array($res_array))
                echo '<option value="'.$res['brand_name'].'">'.$res['brand_name'].'</option>';
            
            $qry = "SELECT model_name FROM vehicle_models";
            $res_array = mysqli_query($conn, $qry);

            echo '
                    </select>
                    <br><br>

                    <label for="model name">Model Name: </label>
                    <select name="model_name" id="model_name" disabled> 
                    </select>
                    <br><br>

                    <label for="registration number">Registration Number: </label><input type="text" name="registration_number" id="registration_number" />
                    <br><br>

                    <label for="engine number">Engine Number: </label><input type="text" name="engine_number" id="engine_number" />
                    <br><br>

                    <label for="vehicle color">Vehicle Color: </label><input type="text" name="vehicle_color" id="vehicle_color" />
                    <br><br>

                    <input type="submit" value="Add Vehicle" />
                </form>
            ';
        ?>
        <button><a href="/car-rental-system/admin/admin-home/admin-home-page.php">Home Page</a></button>
    </body>
</html>