<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "root", "library");
$output = '';
$pagi = '';



    if(isset($_POST["query"]))
        {
        $search = mysqli_real_escape_string($connect, $_POST["query"]);
        $query = "
        SELECT * FROM `add-books` 
        WHERE books_name LIKE '%".$search."%'
        OR books_author_name LIKE '%".$search."%'
        OR books_publication_name LIKE '%".$search."%'
        OR category LIKE '%".$search."%' 
        ";
        }
    else
    {
    $query = "SELECT * FROM `add-books` ORDER BY id asc";
    }
    $result = mysqli_query($connect, $query);
    if(mysqli_num_rows($result) > 0)
        {
            $output .= '
            <div class="table-responsive">
                <section class="header">
                    <div class="items-controller">
                    <h5>Show</h5>
                    <select name="" id="itemperpage">
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="08" selected>08</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                </select>
                <h5>Per Page</h5>
            </div>
            <form action="check-delete.php" method="post" name="data_table">
            <div class="row well">
                <input name="submit" type="submit" value="Delete" id="submit" style="margin-left:30px">  
            </div>
            <br>
            <table id="dtBasicExample">
            <thead>
                <tr>
                    <th style="text-align:center;">Check All <input type="checkbox" id="check_all" value=""></th>
                    <th>Books Image</th>
                    <th>Books</th>
                    <th>Author</th>
                    <th>Publication name</th>
                    <th>Purchase date</th>
                    <th>Price</th>
                    <th>Books availability</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            ';

        while($row = mysqli_fetch_array($result))
        {
            $output .= '
            <tr>
                <td style="text-align:center"><input type="checkbox" value="'.$row["id"].'" name="data[]" id="data"></td>
                <td><img src="'.$row["books_image"].'" height="100" width="100" alt=""></td>
                <td>'.$row["books_name"].'</td>
                <td>'.$row["books_author_name"].'</td>
                <td>'.$row["books_publication_name"].'</td>
                <td>'.$row["books_purchase_date"].'</td>
                <td>'.$row["books_price"].'</td>
                <td>'.$row["books_availability"].'</td>
                <td>'.$row["category"].'</td>
                <td>
                    <a href="edit-books.php?id='.$row['id'].'&name='.$row['books_name'].'"> <i class="fas fa-edit edit"></i> </a><br><br>
                    <a href="delete-book.php?id='.$row['id'].'"> <i class="fas fa-trash delete"></i></a>
                </td>
            </tr>
            </form>
            ';
        }
        $output .= '
            </table>
                </div>
                <div class="bottom-field">      
                    <ul class="pagination">
                        <li class="prev\"><a href="#" id="prev">&#139;</a></li>
                            <!-- page number here -->
                        <li class="next"><a href="#" id="next">&#155;</a></li>
                    </ul>
                </div>
        <script src="../../assets/JS/main.js"></script>
    ';

            echo $output;
        }
    else
        {
                echo 'Data Not Found';
        }

    ?>
