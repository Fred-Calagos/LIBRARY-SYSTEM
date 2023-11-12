<?php
    include '../../inc/header.php';
    include '../../inc/connect.php';
    $id = $_GET['id'];
    $bname = $_GET['name'];
    $query = mysqli_query($conn, "select * from `add-books` where `id` = '$id'");
    while($row=mysqli_fetch_array($query))
    {
        $bimage =$row['books_image'];
        $bauthor =$row['books_author_name'];
        $bpubname= $row['books_publication_name'];
        $purcdate = $row['books_purchase_date'];
        $formatted_date1 = date('Y-m-d', strtotime($purcdate));
        $bprice = $row['books_price'];
        $bavailability= $row['books_availability'];
        $bpubdate = $row['books_publication_date'];
        $formatted_date2 = date('Y-m-d', strtotime($bpubdate));
        $bcategory = $row['category'];
    }

?>
<div class="home">
            <form action="update-books.php" method="post" class="form-books-update" enctype="multipart/form-data">
                <h2>UPDATE <?php echo $bname ?></h2>
                <hr style="height:5px;background-color:white;border:none;">

                <div class="flex-container-update">

                    <div class="container1-update">
                    <img src="<?php echo $bimage?> " alt=""  style="height:220px;width:180px;"><br>
                    <input type="hidden" name="book_id" value="<?php echo $id;?>">
                        <label for="booksname">BOOK NAME: </label>
                            <input type="text" class="form-control" name="booksname" placeholder="Books name" value="<?php echo $bname;?>"><br><br>
                        <label for="bauthorname">AUTHOR</label>
                            <input type="text" class="form-control" name="bauthorname" placeholder="Books author name" value="<?php echo $bauthor;?>"><br><br>
                        <label for="bpubname">PUBLISHER: </label>
                            <input type="text" class="form-control" name="bpubname" placeholder="Books publication name" value="<?php echo $bpubname;?>"><br><br>
                        
                    </div>

                    <div class="container2-update">
                        <label for="bcategory">CATEGORY</label>
                            <select name="bcategory" id="">
                                            <option value="<?php echo $bcategory;?>"><?php echo $bcategory;?></option>
                                            <option value="Programming">Programming</option>
                                            <option value="Art">Art</option>    
                                            <option value="Science">Science</option>
                            </select><br><br>
                        <label for="bpurcdate"> DATE OF PURCHASE: </label>
                            <input type="date" value="2020-01-01" class="form-control" name="bpurcdate" placeholder="Books purchase date" value="<?php echo $formatted_date1;?>"><br><br>
                        <label for="bprice">PRICE</label>
                            <input type="text" class="form-control" name="bprice" placeholder="Books price" value="<?php echo $bprice;?>"><br><br>
                        <label for="bavailability">AVAILABILITY</label>
                            <input type="text" class="form-control" name="bavailability" placeholder="Books availability" value="<?php echo $bavailability;?>"><br><br>
                        <label for="bpubdate">DATE OF PUBLISH</label>
                            <input type="date" value="2020-01-01" class="form-control" name="bpubdate" placeholder="Publication Date" value="<?php echo $formatted_date2;?>"><br><br>
                            <input type="submit" name="update-book" id="btn-edit" value="UPDATE">
                    </div>
                </div>
            </form>
</div>