<?php 
session_start();
include "inc/connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIBRARY MANAGEMENT SYSTEM</title>

    <link rel="stylesheet" href="assets/css/style-login.css">
</head>
<body class="body-admin-login">

    <h1 class="ttl-aklatan">AKLATAN</h1>
    <div class="box">
        <div class="ad-login-container">
            <form method="POST" action="login-user.php">
                <h3>USER LOGIN</h3>
                <div class="input-field">
                    <span><img src="image/user.png" alt=""  class="img" width="14px" height="14px"></span>
                    <input type="text" name="username" class="input" placeholder="USERNAME">
                </div>

                <div class="input-field">
                    <span><img src="image/lock.png" alt="" class="img" width="14px" height="14px"></span>
                    <input type="password" name="password" class="input" placeholder="PASSWORD">
                </div>

                <div class="input-field">
                    <input type="submit" class="submit" value="Login">
                </div>

                <div class="two-col">
                    <div class="one">
                        <a href="inc/registration.php">Register</a>
                    </div>

                    <div class="two">
                        <a href="admin-forget-password.php">Forgot Password</a>
                    </div>
                </div>
                
                <?php if (isset($_SESSION['error'])) { ?>
     		        <span class="error"><?php echo $_SESSION['error']; ?></span>
     	        <?php
                    unset($_SESSION['error']);
                } ?>

            </form>
        </div>
    </div>
</body>
</html>