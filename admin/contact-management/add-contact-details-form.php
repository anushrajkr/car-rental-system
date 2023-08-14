<?php
    session_start();

    if (!isset($_SESSION['login_admin']))
    {
        header("location:/car-rental-system/admin/admin-login/admin-login-form.php");
        exit;
    }

    echo '
        <html>
            <head>
                <title>Add Contact Details</title>
                <script type="text/javascript">
                    function form_validate()
                    {
                        var contact_email = document.getElementById("contact_email").value;
                        var contact_number_1 = document.getElementById("contact_number_1").value;
                        var contact_number_2 = document.getElementById("contact_number_2").value;
                        var address = document.getElementById("address").value;

                        var email_reg = /^\w+([-+.\']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
                        var phone_reg = /^\d{10}$/;

                        if (contact_email == "")
                        {
                            alert("Enter email");
                            return false;
                        } else if (!contact_email.match(email_reg))
                        {
                            alert("Enter valid email");
                            return false
                        }

                        if (contact_number_1 == "")
                        {
                            alert("Enter contact number 1");
                            return false
                        } else if (!contact_number_1.match(phone_reg))
                        {
                            alert("Enter valid contact number 1");
                        }

                        if (contact_number_2 == "")
                        {
                            alert("Enter contact number 2");
                            return false;
                        } else if (!(contact_number_2).match(phone_reg))
                        {
                            alert("Enter valid contact number 2");
                            return false;
                        }

                        if (contact_number_1 == contact_number_2)
                        {
                            alert("Contact number 1 and contact number 2 must be different");
                            return false;
                        }

                        if (address == "")
                        {
                            alert("Enter address");
                            return false;
                        }
                    }
                </script>
            </head>
            <body>
                <h2><u>Add Contact Details</u></h2>
                <form action="add-contact-details-script.php" method="POST" onsubmit="return form_validate()">
                    <label for="contact_email">Contact email: </label><input type="email" id="contact_email" name="contact_email" />
                    <br><br>

                    <label for="contact_number_1">Contact number 1: </label><input type="text" id="contact_number_1" name="contact_number_1" />
                    <br><br>

                    <label for="contact_number_2">Contact number 2: </label><input type="text" id="contact_number_2" name="contact_number_2" />
                    <br><br>

                    <label for="address">Address: </label><br><textarea type="text" id="address" name="address" rows="10" cols="30"></textarea>
                    <br><br>

                    <input type="submit" value="Add details" />
                </form>
            </body>
        </html>
    ';
?>
