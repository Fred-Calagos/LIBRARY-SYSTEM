<?php 
		session_start();
        if (!isset($_SESSION["username"])) {
            ?>
                <script type="text/javascript">
                    window.location="../../admin-login.php";
                </script>
            <?php
        }
        include '../../inc/connect.php';
?>
<head>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
    <br>
    <div class="book-report-container">
        <div class="book-container">
            <div class="book-container-btn">
            <form action="" method="post" name="form1">
						<table class="table ">
							<tr>
								<td>
                                <input type="text" name="search" class="form-control" placeholder="Enter book name">
								</td>
								<td>
									 <input type="submit" name="submit1" class="btn btn-info" value="Search Book">
								</td>
							</tr>
                            <tr>
								<td>
                                <select name="search" id="">
                                <option value="">SELECT CATEGORY</option>
                                            <?php
                                            $sql = "SELECT * FROM category ORDER BY id asc";
                                            $categories = mysqli_query($conn, $sql);
                                                while ($category = mysqli_fetch_array($categories)) {
                                                ?>
                                                    <option value="<?php echo $category['category']?>"><?php echo $category['category']?></option>';
                                            <?php
                                                }
                                            ?>
                                </select><BR>
								</td>
								<td>
									 <input type="submit" name="submit2" class="btn btn-info" value="Search Book">
								</td>
							</tr>
						</table>
                    </form>
                <a href="reports.php" id="adashbtn">REPORTS</a>         
                <button id="print">PRINT</button><br><br>
            </div>
                <div class="book-content">
                
                    <div class="book-report" id="book_report">
                        <table id="dtBasicExample">
                            <thead>
                                <tr>
                                    <th>Books</th>
                                    <th>Author</th>
                                    <th>Publication name</th>
                                    <th>Purchase date</th>
                                    <th>Price</th>
                                    <th>Books availability</th>
                                    <th>Publication Date</th>
                                    <th>Category</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include '../../inc/connect.php';
                                if (isset($_POST["submit1"]) || isset($_POST["submit2"])) {
                                    $i=0;
                                    $res = mysqli_query($conn,"select * from `add-books` where books_name like('$_POST[search]%') or category like('$_POST[search]%')");
                                while ($row = mysqli_fetch_array($res)) {
                                    $i=$i+1;
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
                                    echo $row["books_publication_date"];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row["category"];
                                    echo "</td>";
                                    echo "</tr>";
                                        }
                                    echo "</tr>";
                                    echo "</table>";
                                }else{
                                    $i=0;
                                    $res = mysqli_query($conn,"select * from `add-books` where books_name= books_name");
                                    while ($row = mysqli_fetch_array($res)){
                                        $i=$i+1;
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
                                    echo $row["books_publication_date"];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row["category"];
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            }
                                    ?>
                            </tbody>
                        </table>
                    </div>  
                    
                </div>
            </div>
            <br><br>


    </div>
    <script>
                function printTable() {
            // Get the table element by its ID
            var table = document.getElementById("dtBasicExample");

            // Open the print dialog
            window.print();
        }
            const printBTN = document.getElementById("print");

            printBTN.addEventListener('click', function(){
                print()
            })
    </script>