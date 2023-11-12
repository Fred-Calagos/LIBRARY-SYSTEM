<?php
session_start();
include ('../../inc/connect.php');

if(isset($_POST['add']))
    {

        $fname = $_POST['fullname'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
              //Save product to database
            $insert = mysqli_query($conn, "insert into `admin` (FullName,AdminEmail,UserName,Password) values ('$fname','$email','$username','$password')");

            if($insert)
            {
            
            $_SESSION['added'] = "You have successfully created `$fname`! ";
            header("Location:../../source/admin/admin-profile.php");
            
            }
            else
            { 
                $_SESSION['error'] = "Error Adding! ";
            header("Location:../dashboard.php");
            }
    }

?>