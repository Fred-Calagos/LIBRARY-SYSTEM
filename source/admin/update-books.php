<?php
session_start();
include "../../inc/connect.php";

if(isset($_POST['update-book']))
    {
        $id = $_POST['book_id'];
        $bname = $_POST['booksname'];
        $bauthor =$_POST['bauthorname'];
        $bpubname= $_POST['bpubname'];
        $purcdate = $_POST['bpurcdate'];
        $formatted_date1 = date('Y-m-d', strtotime($purcdate));
        $bprice = $_POST['bprice'];;
        $bavailability= $_POST['bavailability'];
        $bpubdate = $_POST['bpubdate'];
        $formatted_date2 = date('Y-m-d', strtotime($bpubdate));
        $bcategory = $_POST['bcategory'];

            $update = mysqli_query($conn, "UPDATE `add-books` SET 
                `books_name` = '$bname',
                `books_author_name` = '$bauthor',   
                `books_publication_name` = '$bpubname',
                `books_price` = '$bprice',
                `books_availability` = '$bavailability',
                `books_purchase_date` = '$purcdate',
                `books_publication_date` = '$bpubdate',
                `category` = '$bcategory' 
                WHERE `id` = '$id'");
            if($update)
            {
            
            $_SESSION['updated'] = "You have successfully updated `$bname`! ";
            header("Location:books.php");

            }
            else
            { 
                $_SESSION['updated'] = "Error Updating! ";
            header("Location:books.php");
            }
    }

?>