
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

<?php
//fetch.php
$output = '';
$pagi = '';


    if(isset($_POST["query"]))
        {
        $search = mysqli_real_escape_string($conn, $_POST["query"]);
        $query = "
        SELECT * FROM `add-books` 
        WHERE books_name LIKE '%".$search."%'
        OR category LIKE '%".$search."%'"; 
        }
    else
    {
    $query = "SELECT * FROM `add-books` ORDER BY id asc";
    }
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0)
        {   
            if(isset($_POST['add_to_cart'])){

                $product_name = $_POST['product_name'];
                $product_price = $_POST['product_price'];
                $product_image = $_POST['product_image'];
                $product_quantity = 1;
             
                $select_cart = mysqli_query($conn, "SELECT * FROM `book_cart` WHERE book_name = '$product_name'");
             
                if(mysqli_num_rows($select_cart) > 0){
                   $message[] = 'product already added to cart';
                }else{
                   $insert_product = mysqli_query($conn, "INSERT INTO `book_cart` (book_name, price, image, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
                   $message[] = 'product added to cart succesfully';
                }
             
             }
                $select_rows = mysqli_query($conn, "SELECT * FROM `book_cart`") or die('query failed');
                $row_count = mysqli_num_rows($select_rows);
                $output.='

                <a href="book-cart.php" class="book_cart">cart <span>'.$row_count.'</span> </a>

                <div id="menu-btn" class="fas fa-bars"></div><br>
                ';
                if(isset($message)){
                    foreach($message as $message){
                        $output.='
                        <div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>
                        ';
                
                };
                };

            $output.='
            <div class="container">
            <section class="products">
                <h1 class="heading">BOOKS</h1>
                <div class="box-container">
            ';
        while($row = mysqli_fetch_array($result))
        {
                $output .= '

                                <form action="" method="post">
                                    <div class="box">
                                    <img src="'.$row['books_image'].'" alt="">
                                    <h3>"'.$row['books_name'].'"</h3>
                                    <div class="price">$"'.$row['books_price'].'"</div>
                                    <input type="hidden" name="product_name" value="'.$row['books_name'].'">
                                    <input type="hidden" name="product_price" value="'.$row['books_price'].'">
                                    <input type="hidden" name="product_image" value="'.$row['books_image'].'">
                                    <input type="submit" class="btn1_add_to_cart" value="add to cart" name="add_to_cart">
                                    </div>
                                </form>

  
                                ';
                            }
                    $output .= '
                    </div>
                    </section>
                    </div>

                <script src="../../assets/js/product_script.js"></script>
    ';

            echo $output;
        }
    else
        {
                echo 'Data Not Found';
        }

    ?>

