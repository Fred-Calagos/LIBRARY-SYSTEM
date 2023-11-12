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
<?php
    $id = $_GET['print'];
    $query = mysqli_query($conn, "select * from `user-order` where `id` = '$id'");
    while($row=mysqli_fetch_array($query))
    {
        $name =$row['name'];
        $number =$row['number'];
        $email= $row['email'];
        $method = $row['method'];
        $street = $row['street'];
        $city = $row['city'];
        $country= $row['country'];
        $pin_code = $row['pin_code'];
        $total_product = $row['total_products'];
        $total_price = $row['total_price'];
        $status = $row['status'];
    }

?>
<button id="print-r">PRINT</button><br><br>
<section class="receipt-form">

    <div class="receipt-container">
        <img src="../../image/logo/logo-2.png" alt="" srcset="" class="logo"><br> <span>AKLATAN</span>
        <div class="receipt-content">
            <div class="owner-info">

                <h6>Tawog, Hinunangan, Southern Leyte</h6>
                <h6>Email: aklatan@gmail.com</h6>
                <h6>Number: 09123456789</h6>
            </div>
            <div class="cust-info">
                <h6>To: <?php echo $name?></h6>
                <h6>Address:<?php echo $street. " ". $city. " ".$country;?></h6>
                <h6>Email: <?php echo $email?></h6>
                <h6>Number: <?php echo $number?></h6>
            </div>
            <div class="cust-info">
                <h6>Receipt No.: <?php echo $pin_code?></h6>
                <h6>Payment Method: <?php echo $method?> </h6>
            </div>
        </div>
            <div class="order-info">
                <table class="order-details" id="order-details">
                <?php
                    $books = explode(",", $total_product);
                    $book_names = array();
                    $quantities = array();
                    $prices = array();
                    
                    foreach ($books as $book) {
                        $book = trim($book); // Remove any extra whitespace

                        // Check if the input string matches the expected pattern
                        if (preg_match('/^([\w\s-]+)\((\d+)\)\((\d+)\)$/', $book, $matches)) {
                            $name = $matches[1];
                            $quantity = $matches[2];
                            $price = $matches[3];

                            array_push($book_names, $name);
                            array_push($quantities, $quantity);
                            array_push($prices, $price);
                        } else {
                            // Display an error message if the input string does not match the expected pattern
                            echo "Error: Input string does not match pattern - " . $book . "<br>";
                        }
                    }
                    echo "<tr>";
                    echo "<th>Book Name</th>";
                    echo "<th>Quantity</th>";
                    echo "<th>Price</th>";
                    echo "<th>Total Price</th>";
                    echo "</tr>";

                    // Display each book in a separate row
                    for ($i = 0; $i < count($book_names); $i++) {
                        echo "<tr>";
                        echo "<td>" . $book_names[$i] . "</td>";
                        echo "<td>" . $quantities[$i] . "</td>";
                        echo "<td>" . "₱ " .  $prices[$i] . "</td>";

                        // Calculate and display the total price for each book
                        $total_book_price = $quantities[$i] * $prices[$i];

                        echo "</tr>";
                    }
                    echo "<tr>";
                    echo "<td colspan='3'></td>";
                    echo "<td>" . "₱ " .$total_price . "</td>";
                    echo "</tr>";
                ?>
                </table>
            </div>
    </div>
</section>
    <script>
        const printBTN = document.getElementById("print-r");

        printBTN.addEventListener('click', function(){
            print()
        })
    </script>