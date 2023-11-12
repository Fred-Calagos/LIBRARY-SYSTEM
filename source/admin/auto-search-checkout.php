<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "root", "library");
$output = '';
$pagi = '';



    if(isset($_POST["query"]))
        {
        $search = mysqli_real_escape_string($connect, $_POST["query"]);
        $query = "
        SELECT * FROM `user-order` 
        WHERE pin_code LIKE '%".$search."%'
        OR city LIKE '%".$search."%'
        OR status LIKE '%".$search."%'
        OR name LIKE '%".$search."%'
        ";
        }
    else
    {
    $query = "SELECT * FROM `user-order` ORDER BY id desc";
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
                <br><br>
            </div>
            <table id="dtBasicExample">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone number</th>
                    <th>email</th>
                    <th>Method of Payment</th>
                    <th>Street</th>
                    <th>City</th>
                    <th>Country</th>
                    <th>Total Products</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            ';

        while($row = mysqli_fetch_array($result))
        {
            $output .= '
            <tr>
                <td>'.$row["name"].'</td>
                <td>'.$row["number"].'</td>
                <td>'.$row["email"].'</td>
                <td>'.$row["method"].'</td>
                <td>'.$row["street"].'</td>
                <td>'.$row["city"].'</td>
                <td>'.$row["country"].'</td>
                <td>'.$row["total_products"].'</td>
                <td>₱'.$row["total_price"].'</td>
                <td>'.$row["status"].'</td>
                <td>
                    <a href="checkout.php?edit='.$row['id'].'&name='.$row['name'].'"> <i class="fas fa-edit edit"></i> </a>
                    <a href="order-receipt.php?print='.$row['id'].'&name='.$row['name'].'"><i class="fas fa-eye receipt_print"></i></a>
                    <a href="checkout.php?delete='.$row['id'].'"> <i class="fas fa-trash delete"></i></a>
                </td>
            </tr>
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
