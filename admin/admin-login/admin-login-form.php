<html>
    <head>
        <title>
            Admin Login Page
        </title>
    </head>
    <body style="background-image: url(/car-rental-system/images/cars-background.webp); background-size: cover;">
        <div style="text-align: center; width: 100%; margin-top: 100px; float: left">
            <div style="width: 40%; float: left; min-height: 200px; background-color: #a0cdf9; margin-left: 30%;">
                <h2>ADMIN LOGIN</h2>
                <p><strong>WELCOME TO THE LOGIN PAGE FOR ADMIN</strong></p>

                <form action="/car-rental-system/admin/admin-login/admin-login.php" method="POST">
                    <label for="username"><b>Username: </b></label><input type="text" name="username" id="username" />
                    <br><br>

                    <label for="password"><b>Password: </b></label><input type="password" name="passwd" id="passwd" />
                    <br><br>

                    <input type="submit" value="Login" />
                </form>
            </div>
        </div>    
    </body>
</html>