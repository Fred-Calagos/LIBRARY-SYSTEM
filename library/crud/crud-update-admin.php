<?php
session_start();
include "../../inc/connect.php";

if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $fname = $_POST['fullname'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];

            $update = mysqli_query($conn, "UPDATE `admin` SET `FullName` = '$fname',  `AdminEmail` = '$email',  `UserName` = '$username',  `Password` = '$password' WHERE `id` = '$id' ");
            if($update)
            {
            
            $_SESSION['updated'] = "You have successfully updated `$fname`! ";
            header("Location:../../source/admin/admin-profile.php");

            }
            else
            { 
                $_SESSION['updated'] = "Error Updating! ";
            header("Location:../../source/admin/admin-profile.php");
            }
    }

?>