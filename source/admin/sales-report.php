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
        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
        <script src="../../assets/js/jquery.min.js"></script>
        <script src="../../assets/js/bootstrap.min.js"></script>
        <script src="../../assets/js/chart.js"></script>
    </head>
    <br>


    <div class="sales_graph" id="sales_graph">
        <?php 
            $sql = "SELECT * FROM sales";
            $result = mysqli_query($conn,$sql);
            $chart_data = "";
            while($row = mysqli_fetch_array($result)){
                $productname[] = $row['product_name'];
                $sales[] = $row['quantity'];
            }
        ?>

    <div class="row">
        <div class="col-md-10 offset-md-1">
        <div class="card">
        <div class="card-header bg">
            <h1>SALES REPORT OF E-LIBRARY</h1>
        </div>
            <div class="card-body">
            <canvas id="chartjs_bar"></canvas>
            </div>
        </div>
        </div>
    </div>

    <script type="text/javascript">
        var ctx = document.getElementById("chartjs_bar").getContext('2d');
        var myChart = new Chart(ctx,{
            type: 'bar',
            data: {
                labels:<?php echo json_encode($productname); ?>,
                datasets: [{
                    backgroundcolor: [
                        "#ffd322",
                        "#5945fd",
                        "#25d5f2",
                        "#2ec551",
                        "#ff344e",
                    ],
                    data: <?php echo json_encode($sales);?>
                }]
            },
            options:{
                legend: {
                    display:true,
                    position:'bottom',
                    labels: {
                        fontColor: '#71748d',
                        fontFamily: 'Circular Std Book',
                        fontSize: 14,
                    }
                },
            }
        });
        </script>
    </div>
    <br><br><br>

    <div class="sales_report_container">
        <div class="sales_container">
            <div class="sales-container-btn">
                    <a href="reports.php" id="adashbtn">REPORTS</a>   
                    <button onclick="print_div()">PRINT</button><br><br>
            </div>
            <div class="user_content">
                <div class="sales_report" id="sales_report">
                            <?php
                            include '../../inc/connect.php';
                            $query = "SELECT total_products FROM `user-order`";
                            $result = mysqli_query($conn, $query);
                            
                            // Create an associative array to store the sales report
                            $report = array();
                            $total = 0;
                            // Process each row of the result set
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $products = $row['total_products'];
                                    // Extract the name, quantity, and price from the product string
                                    preg_match_all("/([^,]+?)\((\d+)\)\((\d+)\)/", $products, $matches, PREG_SET_ORDER);

                                    foreach ($matches as $match) {
                                        $name = $match[1];
                                        $quantity = intval($match[2]);
                                        $price = intval($match[3]);
                                        $total += $quantity * $price;
                                    if (isset($report[$name])) {
                                        $report[$name]['quantity'] += $quantity;
                                        $report[$name]['price'] += $price;
                                    } else {
                                        $report[$name] = array('quantity' => $quantity, 'price' => $price);
                                    }
                                }
                            }

                            // Update the sales table with the updated sales data
                            foreach ($report as $name => $data) {
                                $productName = mysqli_real_escape_string($conn, $name);
                                $quantity = $data['quantity'];
                                $price = $data['price'];
                                $totalPrice = $quantity * $price;

                                if (isset($existingSales[$productName])) {
                                    // Product already exists in the sales table, update the existing record
                                    $updateQuery = "UPDATE `sales` SET `quantity` = '$quantity',` price` = '$price', `total` = '$totalPrice' WHERE `product_name` = '$productName'";
                                    $updateResult = mysqli_query($conn, $updateQuery);

                                    if (!$updateResult) {
                                        echo "Error updating data for product '$productName': " . mysqli_error($conn);
                                    }
                                } 
                                // Insert new items into the sales table
                                foreach ($report as $name => $data) {
                                    $productName = mysqli_real_escape_string($conn, $name);
                                    $quantity = $data['quantity'];
                                    $price = $data['price'];
                                    $totalPrice = $quantity * $price;
                                
                                    $insertQuery = "INSERT INTO sales (product_name, quantity, price, total)
                                                    SELECT '$productName', '$quantity', '$price', '$totalPrice'
                                                    FROM dual
                                                    WHERE NOT EXISTS (
                                                        SELECT product_name FROM sales WHERE product_name = '$productName'
                                                    ) LIMIT 1";
                                
                                    $insertResult = mysqli_query($conn, $insertQuery);
                                
                                    if (!$insertResult) {
                                        echo "Error inserting data for product '$productName': " . mysqli_error($conn);
                                    }
                                }
                                
                            }
                            // Close the database connection
                            mysqli_close($conn);
                                ?>
                    <div class="sales_report_tbl" id="sales_report_tbl">
                        <table id="dtBasicExample">
                            <thead>
                                <tr>
                                    <th>Products</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($report as $name => $data){ ?>
                                    <tr>
                                        <td><?php echo $name; ?></td>
                                        <td><?php echo $data['quantity']; ?></td>
                                        <td><?php echo $data['price']; ?></td>
                                        <td><?php echo $data['quantity'] * $data['price']; ?></td>
                                    
                                <?php } ?>
                            </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="3">Grand Total</th>
                                    <th><?php echo $total; ?></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
            // JavaScript code to handle printing
            function print_div() {
                // Hide elements not to be printed
                document.querySelector("button").style.display = "none";

                // Get the HTML content of the div to print
                var divContent = document.getElementById("sales_report_tbl").innerHTML;
                // Open a new window
                var printWindow = window.open('', '', 'width=800,height=600');

                // Set the HTML content of the new window to the div content
                printWindow.document.write('<html><head><title>SALES REPORT</title></head><body>');
                printWindow.document.write(divContent);s
                printWindow.document.write('<style>@media print {');
                printWindow.document.write('body { font-size: 12pt; color: #333; }');
                printWindow.document.write('table { border-collapse: collapse; margin: auto; }');
                printWindow.document.write('td, th { border: 1px solid #ccc; padding: 5px; }');
                printWindow.document.write('}</style>');
                printWindow.document.write('</body></html>');

                // Print the new window
                printWindow.print();

                // Close the new window
                printWindow.close();

                // Show the hidden elements
                document.querySelector("button").style.display = "block";
            }
        </script>