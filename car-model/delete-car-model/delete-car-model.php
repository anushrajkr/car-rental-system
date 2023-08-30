<?php
    session_start();

    if (!isset($_SESSION['login_admin']))
    {
        header("location:/car-rental-system/admin/admin-login/admin-login-form.php");
        exit;
    }
    
    $conn = mysqli_connect('localhost', 'root', '', 'car_rental_system');

    if ($conn->connect_error)
        die("Connection error".$conn->connect_error);

    // $brand_name = $_POST['brand_name'];
    // $model_name = $_POST['model_name'];

    $model_id = $_POST['model_id'];

    $qry = "SELECT COUNT(*) FROM vehicles WHERE model_id = $model_id";

    $res_array = mysqli_query($conn, $qry);
    $res = mysqli_fetch_array($res_array);

    $vehicle_count = $res[0];

    if ($vehicle_count == 0)
    {
        $qry = "DELETE FROM vehicle_models WHERE model_id = $model_id";
 
        if ($conn->query($qry) == TRUE)
            echo "Car model successfully deleted.<br>";
        else
            echo "Error in deletion of car model.<br>Error: ".$conn->error;
    } else 
    {
        echo 'There are vehicles belonging to this model, please delete them first before this model can be deleted<br>';
    }    
?>