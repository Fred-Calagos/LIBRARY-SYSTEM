<?php
    session_start();
    include 'connect.php';
?>
<?php
include 'addregistration.php';
$msg= '';
if(isset($_SESSION['added'])){
    $msg = $_SESSION['added'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <form name="registration" action="addregistration.php" method="post">
        <input type="text" name="fname" placeholder="First Name" required><br><br>
        <input type="text" name="mname" placeholder="Middle Name" required><br><br>
        <input type="text" name="lname" placeholder="Last Name" required><br><br>
        <input type="text" name="username" placeholder="Username" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <input type="email" name="email" placeholder="Email" required><br><br>
        <input type="text" name="contact" placeholder="Contact" required><br><br>
        <input type="text" name="street" placeholder="Street" required><br><br>
        <input type="text" name="city" placeholder="City" required><br><br>
        <input type="text" name="country" placeholder="Country" required><br><br>
        <input type="submit" value="Register" name="add"><br><br>
    </form>
</body>
</html>