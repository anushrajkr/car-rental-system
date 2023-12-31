<?php
    session_start();

    if (!isset($_SESSION['login_user']))
    {
        header("location:/car-rental-system/registered-user/user-login/user-login-page.html");
        exit;
    }

    $conn = mysqli_connect('localhost', 'root', '', 'car_rental_system');
        
    if ($conn->connect_error)
        die("Connection error".$conn->connect_error);

    // check for card in database

    $card_number = $_POST['card_number'];

    $qry = "SELECT count(*) FROM card_details WHERE card_number = $card_number";
    
    $res_array = mysqli_query($conn, $qry);
    $res = mysqli_fetch_array($res_array);

    $card_count = $res[0];

    if ($card_count == 0)
    {
        $name_on_card = $_POST['name_on_card'];
        $expiry_date = $_POST['expiry_date'];
        
        $qry = "INSERT INTO card_details VALUES ($card_number, '$name_on_card', '$expiry_date')";

        mysqli_query($conn, $qry);
    }

    $card_name = $_POST['card_name'];
    $username = $_SESSION['login_user'];
    
    $qry = "INSERT INTO user_cards (card_name, username, card_number) VALUES 
    ('$card_name', '$username', $card_number)";

    echo '
        <link rel="stylesheet" type="text/css" href="card-addition-script-css.css">
        <div class="main">
    ';

    if ($conn->query($qry) == TRUE)
    {
        echo '
            Card successfully added
            <br><br>
        ';

        if ((isset($_SESSION['ongoing_payment'])) && ($_SESSION['ongoing_payment'] == TRUE))
        {
            echo '
                <div class="submit">
                    <form action="/car-rental-system/registered-user/payment/payment-script.php" method="POST">

                        <input type="hidden" id="payment_method" name="payment_method" value="card"/>
                        <input type="submit" value="Return to payment" />

                    </form>
                </div>
            ';
        } else
        {
            echo '
                </div>
                <button><a href="/car-rental-system/registered-user/profile-management/view-profile.php">Go back</a></button> 
            ';
        }
    } else
    {
        echo'
            Error in addition of card<br>
            Error: '.$conn->error.'
            </div>
            <button><a href="/car-rental-system/registered-user/payment/cards/add-card.php">Try again</a></button>    
        ';        
    }
?>