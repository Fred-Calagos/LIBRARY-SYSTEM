<?php
    ob_start();
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

if(isset($_POST['update_update_btn'])){
   $update_value = $_POST['update_quantity'];
   $update_id = $_POST['update_quantity_id'];
   $update_quantity_query = mysqli_query($conn, "UPDATE `book_cart` SET quantity = '$update_value' WHERE id = '$update_id'");

   if($update_quantity_query){
      header('location:book-cart.php?message=Quantity%20updated%20successfully.');   
    };
};

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `book_cart` WHERE id = '$remove_id'");
   header('location:book-cart.php?message=Item%20removed%20from%20cart.');
};

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `book_cart`");
   header('location:book-cart.php');
   ob_end_flush();
}

?>
<body>

 <div class="home">
 <?php if(isset($_GET['message'])): ?>
   <div class="message"><?php echo $_GET['message']; ?></div>
<?php endif; ?>
    <div class="container">

<section class="shopping-cart">

   <h1 class="heading"> cart</h1>

   <table>

      <thead>
         <th>image</th>
         <th>name</th>
         <th>price</th>
         <th>quantity</th>
         <th>total price</th>
         <th>action</th>
      </thead>

      <tbody>
         <?php 
         $randNumber1 = rand(100000,999999); 
         $randNumber2 = rand(100000,999999); 
         $randNumber3 = rand(100000,999999);
         $orderNumber = $randNumber1.$randNumber2.$randNumber3;
         ?>
         <?php 
         $username = mysqli_real_escape_string($conn, $_SESSION["username"]);
         $select_cart = mysqli_query($conn, "SELECT * FROM `book_cart` where user_name = '$username'");
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
         ?>

         <tr>
            <td><img src="<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
            <td><?php echo $fetch_cart['book_name']; ?></td>
            <td>$<?php echo $fetch_cart['price']; ?></td>
            <td>
               <form action="" method="post">
                  <input type="hidden" name="user_name" value="<?php echo $username; ?>">
                  <input type="hidden" name="update_quantity_id"  value="<?php echo $fetch_cart['id']; ?>" >
                  <input type="number" name="update_quantity" min="1"  value="<?php echo $fetch_cart['quantity']; ?>" >
                  <input type="submit" value="update" name="update_update_btn">
               </form>   
            </td>
            <td>₱ <?php echo $sub_total =  $fetch_cart['price'] * $fetch_cart['quantity']; ?></td>
            <td><a href="book-cart.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('remove item from cart?')" class="delete-btn"> <i class="fas fa-trash"></i> remove</a></td>
         </tr>
         <?php
         $grand_total += $sub_total;
            };
            
         };
         ?>
         <tr class="table-bottom">
            <td><a href="student-buy-books.php" class="option-btn" style="margin-top: 0;">continue shopping</a></td>
            <td colspan="3">grand total</td>
            <td>₱ <?php echo $grand_total; ?></td>
            <td><a href="book-cart.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="delete-btn"> <i class="fas fa-trash"></i> delete all </a></td>
         </tr>

      </tbody>

   </table>

   <div class="checkout-btn">
      <a href="book-checkout.php?order=<?php echo $orderNumber;?>&id=<?php echo $username;?>" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">procced to checkout</a>
   </div>

</section>

</div>
</div> 
</body>
<!-- custom js file link  -->
<script src="../../assets/js/product_script.js"></script>
