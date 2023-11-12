<?php
session_start();
include "../../inc/connect.php";
     if(isset($_POST['update_product'])){
        $id = $_POST['update_p_id'];
        $update_o_status = $_POST['order_status'];
    
        // use prepared statement to prevent SQL injection
        $update_query = $conn->prepare("UPDATE `user-order` SET `status`=? WHERE id=?");
        $update_query->bind_param("ss", $update_o_status, $id);
        $update_query->execute();
    
        if($update_query){
            header('location:checkout.php');
            $message[] = 'product has been Updated';
        } else {
            header('location:admin.php');
            $message[] = 'product could not be Updated: ' . $conn->error; // provide detailed error message
        }
    }
?>