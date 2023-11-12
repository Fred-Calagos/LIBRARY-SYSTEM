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
$username = $_GET['id'];
if(isset($_POST['order_btn'])){

   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $method = $_POST['method'];
   $street = $_POST['street'];
   $city = $_POST['city'];
   $country = $_POST['country'];
   $pin_code = $_POST['pin_code'];

   $cart_query = mysqli_query($conn, "SELECT * FROM `book_cart` WHERE user_name = '$username'");
   $price_total = 0;
   if(mysqli_num_rows($cart_query) > 0){
      $product_name = array();
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['book_name'] .'('. $product_item['quantity'] .')('. $product_item['price'] .')';
         $product_price = number_format($product_item['price'] * $product_item['quantity']);
         $price_total += $product_price;
         
          // Update books availability
          $current_books = $product_item['book_name'];
          $quantity = $product_item['quantity'];
          $availability_query = mysqli_query($conn, "SELECT books_availability FROM `add-books` WHERE books_name = '$current_books'");
          $availability = mysqli_fetch_assoc($availability_query);
          $new_availability = $availability['books_availability'] - $quantity;
          $update_query = mysqli_query($conn, "UPDATE `add-books` SET books_availability = $new_availability WHERE books_name = '$current_books'");
      };
     
      unset($_SESSION['$row_count']);	
   };

   $total_product = implode(', ',$product_name);
   $detail_query = mysqli_query($conn, "INSERT INTO `user-order`(name, number, email, method, street, city, country, pin_code, total_products, total_price,status) VALUES('$name','$number','$email','$method','$street','$city','$country','$pin_code','$total_product','$price_total', 'Pending')") or die('query failed');
   $delete_cart =  mysqli_query($conn, "DELETE FROM `book_cart` WHERE id = id");
   $delete_sales =  mysqli_query($conn, "DELETE FROM `sales`");

   if($cart_query && $detail_query){
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>thank you for shopping!</h3>
         <div class='order-detail'>
            <span>".$total_product."</span>
            <span class='total'> total : ₱ ".$price_total."</span>
         </div>
         <div class='customer-details'>
            <p> your name : <span>".$name."</span> </p>
            <p> your number : <span>".$number."</span> </p>
            <p> your email : <span>".$email."</span> </p>
            <p> your address : <span> ".$street.", ".$city.", ".$country."</span> </p>
            <p> Receipt Code: <span> ".$pin_code."</span> </p>
            <p> your payment mode : <span>".$method."</span> </p>
            <p>(*pay when product arrives*)</p>
         </div>
            <a href='student-buy-books.php' class='btn_cont_shop'>continue shopping</a>
         </div>
      </div>
      ";
   }

}
?>

<body>

<div class="home">

<section class="checkout-form">

   <h1 class="heading">complete your order</h1>

   <form action="" method="post">

   <div class="display-order">

      <?php
         $select_cart = mysqli_query($conn, "SELECT * FROM `book_cart` where user_name = '$_SESSION[username]'");
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = $fetch_cart['price'] * $fetch_cart['quantity'];
            $grand_total = $total += $total_price;
      ?>
      <span><?= $fetch_cart['book_name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
      <?php
         }
      }else{
         echo "<div class='display-order'><span>your cart is empty!</span></div>";
      }
      ?>
      <span class="grand-total"> grand total : ₱ <?= $grand_total; ?></span>
   </div>

   <?php
   $orderNum = $_GET['order'];
    $query = mysqli_query($conn, "select * from `user` where `username` ='$_SESSION[username]'");
    while($row=mysqli_fetch_array($query))
    {
        $fname =$row['fname'];
        $lname =$row['lname'];
        $mname =$row['mname'];
        $email =$row['email'];
        $contact= $row['contact'];
        $street = $row['street'];
        $city = $row['city'];
        $country = $row['country'];
    }

   ?>

      <div class="flex">
         <div class="inputBox">
            <span>your name</span>
            <input type="text" placeholder="enter your name" name="name" value="<?php echo $fname. " "; echo $lname. " "; echo $mname;?>" readonly>
         </div>
         <div class="inputBox">
            <span>your number</span>
            <input type="text" placeholder="enter your number" name="number" value="<?php echo $contact?>" readonly>
         </div>
         <div class="inputBox">
            <span>your email</span>
            <input type="email" placeholder="enter your email" name="email" value="<?php echo $email?>" readonly>
         </div>
         <div class="inputBox">
            <span>payment method</span>
            <select name="method">
               <option value="cash on delivery" selected>cash on delivery</option>
               <option value="credit cart">credit cart</option>
               <option value="paypal">paypal</option>
            </select>
         </div>
         <div class="inputBox">
            <span>address line 1</span>
            <input type="text" name="street" value="<?php echo $street?>"readonly>
         </div>
         <div class="inputBox">
            <span>city</span>
            <input type="text" name="city" value="<?php echo $city?>" readonly>
         </div>
         <div class="inputBox">
            <span>country</span>
            <input type="text" name="country" value="<?php echo $country?>"readonly>
         </div>
         <div class="inputBox">
            <span>pin code</span>
            <input type="text" name="pin_code" value="<?php echo $_GET['order'];?>"readonly>
         </div>
      </div>
      <input type="submit" value="order now" name="order_btn" class="btn_order">
   </form>

</section>

</div>

<!-- custom js file link  -->
<script src="../../assets/js/product_script.js"></script>
   
</body>
</html>