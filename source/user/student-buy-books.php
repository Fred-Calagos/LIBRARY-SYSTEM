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
<?php

if(isset($_POST['add_to_cart'])){
   $username = $_POST['user_name'];
   $sn = $_POST['product_name'];
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = 1;

   $select_cart = mysqli_query($conn, "SELECT * FROM `book_cart` WHERE book_name = '$product_name' and user_name = '$username'");

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to cart';
   }else{
      $insert_product = mysqli_query($conn, "INSERT INTO `book_cart` (user_name,book_name, price, image, quantity) VALUES('$username','$product_name', '$product_price', '$product_image', '$product_quantity')");
      $message[] = 'product added to cart successfully';
   }

}

?>

<body>
   
<?php
      $username = mysqli_real_escape_string($conn, $_SESSION["username"]);
      $select_rows = mysqli_query($conn, "SELECT * FROM `book_cart` where `user_name` = '$username'") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>

      <a href="book-cart.php" class="book_cart">cart <span><?php echo $row_count; ?></span> </a>

      <div id="menu-btn" class="fas fa-bars"></div><br>
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>

<div class="container">

<section class="products">
   <h1 class="heading" style="text-align:center;font-size:50px">BOOKS</h1>
   <form action="" method="post" name="form1">
						<table class="table" id="sbb_btn">
                     <tr>
                        <td>
                           <input type="text" name="search_bname" class="form-control" placeholder="Enter book name">
                           <input type="submit" name="submit1" class="btn btn-info" value="Search Book">
                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								</td>
								<td>
                           <select name="search_category" id="">
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
         </form><br><br><br>
   <div class="box-container">

      <?php
      if(isset($_POST["submit2"])){
         $i=0;
         $res = mysqli_query($conn,"select * from `add-books` where category like('$_POST[search_category]%')");
         while($fetch_product = mysqli_fetch_array($res)){
            $i=$i+1;
      ?>

      <form action="" method="post">
         <div class="box">
            <img src="<?php echo $fetch_product['books_image']; ?>" alt="">
            <h3><?php echo $fetch_product['books_name']; ?></h3>
            <div class="price"><?php echo $fetch_product['books_price']; ?></div>
            
            <input type="hidden" name="product_name" value="<?php echo $fetch_product['books_name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['books_price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['books_image']; ?>">
            <input type="submit" class="btn1_add_to_cart" value="add to cart" name="add_to_cart">
         </div>
      </form>

      <?php
         }
      }
      elseif(isset($_POST["submit1"])){
         $i=0;
         $res = mysqli_query($conn,"select * from `add-books` where books_name like('$_POST[search_bname]%')");
         while($fetch_product = mysqli_fetch_array($res)){
            $i=$i+1;
      ?>

      <form action="" method="post">
         <div class="box">
            <img src="<?php echo $fetch_product['books_image']; ?>" alt="">
            <h3><?php echo $fetch_product['books_name']; ?></h3>
            <div class="price"><?php echo $fetch_product['books_price']; ?></div>
            
            <input type="hidden" name="product_name" value="<?php echo $fetch_product['books_name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['books_price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['books_image']; ?>">
            <input type="submit" class="btn1_add_to_cart" value="add to cart" name="add_to_cart">
         </div>
      </form>

      <?php
         }
      }
      else{
         $select_products = mysqli_query($conn, "SELECT * FROM `add-books`");
         while($fetch_product = mysqli_fetch_assoc($select_products)){
      ?>

      <form action="" method="post">
         <div class="box">
            <img src="<?php echo $fetch_product['books_image']; ?>" alt="">
            <h3><?php echo $fetch_product['books_name']; ?></h3>
            
            <div class="price">₱ <?php echo $fetch_product['books_price']; ?></div>
            <input type="hidden" name="user_name" value="<?php echo $username; ?>">
            <input type="hidden" name="product_name" value="<?php echo $fetch_product['books_name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['books_price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['books_image']; ?>">
            <input type="submit" class="btn1_add_to_cart" value="add to cart" name="add_to_cart">
         </div>
      </form>

      <?php
         }
      }
      ?>
   </div>

</section>

</div>

<!-- custom js file link  -->
<script src="../../assets/js/product_script.js"></script>

</body>
</html>
</div>