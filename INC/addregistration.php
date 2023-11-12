<?php
include "connect.php";

if (isset($_POST["add"])) {

    $fname  = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $country = $_POST['country'];


    $insert=mysqli_query($conn, "insert into `user`(fname,mname,lname,username,password,email,contact,`user-profile`,street,city,country) values ('$fname','$mname','$lname ','$username', '$password','$email ','$contact','default','$street','$city ','$country')");

    if($insert)
    {

    $_SESSION['added'] = "You Are successfully REgistered";
    header("Location:../login-user.php");

    }
    else
    { 
        $_SESSION['error'] = "Error Adding! ";
    header("Location:../login-user.php");
    }
}
?>