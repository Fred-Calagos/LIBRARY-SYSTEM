<?php
session_start();
include "../../inc/connect.php";
    if (isset($_POST["add-submit"])) {

        $bname = $_POST['booksname'];
        $image_name=$_FILES['f1']['name'];
        $bauthor =$_POST['bauthorname'];
        $bpubname= $_POST['bpubname'];
        $purcdate = $_POST['bpurcdate'];
        $formatted_date1 = date('Y-m-d', strtotime($purcdate));
        $bprice = $_POST['bprice'];
        $bavailability= $_POST['bavailability'];
        $bpubdate = $_POST['bpubdate'];
        $formatted_date2 = date('Y-m-d', strtotime($bpubdate));
        $bcategory = $_POST['bcategory'];
        $file_name=$_FILES['file']['name'];
        $temp = explode(".", $image_name);
        $temp2 = explode(".", $file_name);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        $newfilename2 = round(microtime(true)) . '.' . end($temp2);
        $imagepath="../../library/books-image/".$newfilename;
        $filepath="../../library/books-file/".$newfilename2;
        move_uploaded_file($_FILES["f1"]["tmp_name"],$imagepath);
        move_uploaded_file($_FILES["file"]["tmp_name"],$filepath);

        $insert=mysqli_query($conn, "insert into `add-books` (books_name,books_image,books_author_name,books_publication_name,books_purchase_date,books_price,books_availability,books_file,books_publication_date,category)
        values('$bname','$imagepath','$bauthor','$bpubname','$formatted_date1','$bprice','$bavailability','$filepath','$formatted_date2','$bcategory')");

        if($insert)
            {
            
            $_SESSION['added'] = "You have successfully added a boo: `$bname`";
            header("Location:books.php");

            }
            else
            { 
                $_SESSION['error'] = "Error Adding! ";
            header("Location:books.php");
            }
    }
?>