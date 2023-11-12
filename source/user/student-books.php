<?php
    session_start();
    if (!isset($_SESSION["username"])) {
        ?>
            <script type="text/javascript">
                window.location="../user-login.php";
            </script>
        <?php
    }
    include '../../inc/user-header.php';
    include '../../inc/connect.php';
?>
<div class="home">
    <div class="dashboard-content">
		<div class="dashboard-header">
			<div class="container">
				<div class="books">
					<form action="" method="post" name="form1">
						<table class="table" id="sb_btn">
							<tr>
								<td>
                                    <input type="text" name="search" class="form-control" placeholder="Enter book name">
                                    <input type="submit" name="submit1" class="btn btn-info" value="Search Book">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								</td>
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
                    <?php
                        if (isset($_POST["submit1"]) || isset($_POST["submit2"])) {
                            $i=0;
                            $res = mysqli_query($conn,"select * from `add-books` where books_name like('$_POST[search]%') or category like('$_POST[search]%')");
                            echo "<table id='dtBasicExample'>";
                            echo "<tr>";
                            while ($row = mysqli_fetch_array($res)){
                                 $i=$i+1;
                                 echo "<td>";
                                 ?> <a href="../library/<?php echo $row["books_file"]; ?>" target="_blank"><img src="../library/<?php echo $row["books_image"]; ?> " alt=""  style="height:220px;width:180px;"></a> <?php 
                                 echo "</br>";
                                 echo "</br>";
                                 echo "<b>".$row["books_name"]; "</b>";
                                 echo "</br>";
                                 echo "<b>". 
                                 "Available: ".$row["books_availability"]; "</b>";
                                 echo "</td>";

                                 if ($i>=4) {
                                     echo "</tr>";
                                     echo "<tr>";
                                     $i=0;
                                 }

                        }
                        echo "</tr>";
                        echo "</table>";
                        }
                        else{
                            $i=0;
                            $res = mysqli_query($conn,"select * from `add-books` where books_availability>0");
                            echo "<table id='dtBasicExample' class='table control-books'>";
                            echo "<tr>";
                            while ($row = mysqli_fetch_array($res)){
                                 $i=$i+1;
                                 echo "<td>";
                                 ?> <a href="../library/<?php echo $row["books_file"]; ?>" target="_blank"><img src="../library/<?php echo $row["books_image"]; ?> " alt="" style="height:220px;width:180px;"></a> <?php
                                 echo "</br>";
                                 echo "</br>";
                                 echo "<b>".$row["books_name"]; "</b>";
                                 echo "</br>";
                                 echo "<b>". 
                                 "Available: ".$row["books_availability"]; "</b>";
                                 echo "</td>";

                                 if ($i>=4) {
                                     echo "</tr>";
                                     echo "<tr>";
                                     $i=0;
                                 }

                            }
                            echo "</tr>";
                            echo "</table>";
                            }
                     ?>
				</div>
			</div>					
		</div>
	</div>
</div>