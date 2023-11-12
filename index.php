<?php  
include "inc/connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style-login.css">
    <title>Login Page</title>
</head>
<body style="background-color: maroon;">
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <form class="border shadow-lg p-3 rounded bg-white" action="login-user.php" method="post" style="width: 450px;">
            <h1 class="text-center p-3 text-white" style="background-color: gold;">LOGIN</h1>
            <?php if (isset($_GET['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?=$_GET['error']?>
                </div>
            <?php } ?>
            <div class="mb-1">
                <label class="form-label">Select User Type:</label>
            </div>
            <select name="role" aria-label="Default select example" style="background-color: gold;">
                <option selected value="admin">Admin</option>
                <option value="user">User</option>
                <option value="teacher">Teacher</option>
            </select>
            <div class="mb-3">
                <label for="username" class="form-label">User name</label>
                <input type="text" class="form-control" name="username" id="username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password">
            </div>


            <button type="submit" class="btn btn-primary" style="background-color: maroon; border-color: gold;">LOGIN</button>
        </form>
    </div>
</body>
</html>
