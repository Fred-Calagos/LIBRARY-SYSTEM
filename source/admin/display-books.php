	<!--dashboard area-->
<table id="dtBasicExample" class="table table-striped table-dark text-center">
    <thead>
        <tr>
           <th>Books image</th>
           <th>Books</th>
           <th>Author</th>
           <th>Publication name</th>
           <th>Purchase date</th>
           <th>Price</th>
           <th>Books availability</th>
           <th>ISBN</th>
           <th>Publication Date</th>
           <th>Category</th>
           <th>Action</th>
        </tr>
      </thead>
       
       <tbody>
            <?php
            include '../connect.php';
            $res = mysqli_query($conn, "select * from `add-books`");
            while ($row = mysqli_fetch_array($res)) {
                echo "<tr>";
                echo "<td>";
                echo $row["books_name"];
                echo "</td>";
                echo "<td>";
                echo $row["books_author_name"];
                echo "</td>";
                echo "<td>";
                echo $row["books_publication_name"];
                echo "</td>";
                echo "<td>";
                echo $row["books_purchase_date"];
                echo "</td>";
                echo "<td>";
                echo $row["books_price"];
                echo "</td>";
                echo "<td>";
                echo $row["books_availability"];
                echo "</td>";
                echo "<td>";
                echo $row["books_isbn"];
                echo "</td>";
                echo "<td>";
                echo $row["books_publication_date"];
                echo "</td>";
                echo "<td>";
                echo $row["category"];
                echo "</td>";
                echo "</tr>";
                    }
                ?>
        </tbody>
</table>