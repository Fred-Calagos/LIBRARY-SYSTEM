<?php
ob_start();
		session_start();
        if (!isset($_SESSION["username"])) {
            ?>
                <script type="text/javascript">
                    window.location="../../admin-login.php";
                </script>
            <?php
        }
        include '../../inc/header.php';
        include '../../inc/connect.php';

        if(isset($_GET['delete'])){
            $delete_id = $_GET['delete'];
            $delete_query = mysqli_query($conn, "DELETE FROM `user-order` WHERE id = $delete_id ") or die('query failed');
            if($delete_query){
               header('location:checkout.php');
               $message[] = 'product has been deleted';
            }else{
               header('location:admin.php');
               $message[] = 'product could not be deleted';
            };
         }
          
?>
<div class="home">
    
    <!-- TODO: DESIGN BUTTON ADD & SEARCH BAR WITH SUGGESTION  -->

    <ul class="nav-search-add">
        <li class="li2"><form action=""><input type="text" name="search-books" id="search-books" placeholder="SEARCH" style="border-right:thin solid black;"><i class="fas fa-search"></i></form></li>
    </ul>
	<!--Read Book Table area-->
    <!-- FIXME: need ug edit sa table , kuhaan -->
    <br><br>
    <div id="result"></div>
    <script>
            $(document).ready(function(){

                load_data();

                    function load_data(query)
                        {
                            $.ajax({
                                    url:"auto-search-checkout.php",
                                    method:"POST",
                                    data:{query:query},
                                    success:function(data)
                                    {
                                        $('#result').html(data);
                                    }
                                });
                        }
                    $('#search-books').keyup(function(){
                        var search = $(this).val();
                            if(search != '')
                                {
                                    load_data(search);
                                }
                                else
                                {
                                    load_data();
                                }
                            });
                        });
        </script>
    
    <section class="edit-form-container">
        <?php
            if(isset($_GET['edit'])){
            $edit_id = $_GET['edit'];
            $name =    $_GET['name'];
            $edit_query = mysqli_query($conn, "SELECT * FROM `user-order` WHERE id = $edit_id");
            if(mysqli_num_rows($edit_query) > 0){
            while($fetch_edit = mysqli_fetch_array($edit_query)){
                $id_order = $fetch_edit['id'];
                $status =   $fetch_edit['status'];
                $number  =  $fetch_edit['number'];
                $email =    $fetch_edit['email'];
                $method =   $fetch_edit['method'];
                $street =   $fetch_edit['street'];
                $city =     $fetch_edit['city'];
                $country =  $fetch_edit['country'];
                $pcode =    $fetch_edit['pin_code'];
                $tp =       $fetch_edit['total_price'];
                $total_products = $fetch_edit['total_products'];
            };
        ?>
         <form action="update_checkout.php" method="post" enctype="multipart/form-data">
            <div class="flex-container">
                <div class="cont1">
                    <input type="hidden" name="update_p_id" value="<?php echo $id_order; ?>">
                    <input type="text" class="box" required name="update_p_name" value=" Name: <?php echo $name; ?>" readonly>
                    <input type="text" class="box" required name="update_p_number" value="Number: <?php echo $number; ?>" readonly>
                    <input type="text" class="box" required name="update_p_email" value="Email: <?php echo  $email; ?>" readonly>
                    <input type="text" class="box" required name="update_p_method" value="Payment: <?php echo $method; ?>" readonly>
                    <input type="text" class="box" required name="update_p_street" value="Street: <?php echo $street; ?>" readonly>
                    <input type="text" class="box" required name="update_p_city" value="City: <?php echo $city; ?>" readonly>
                    <input type="text" class="box" required name="update_p_country" value="Country: <?php echo $country; ?>" readonly>
                </div>
                <div class="cont2">
                <h4>ITEMS</h4>
                        <?php
                        $products = explode(",", $total_products); ?>
                        <?php foreach ($products as $product) { ?>
                            
                                <tr>
                                    <td class="box"style="border: 2px solid white;text-align:left;">
                                        <?php echo str_replace("(", " ", str_replace(")", "", $product)); ?><br>
                                    </td>
                                </tr>
                        <?php } ?>

                        <input type="text" class="box" required name="update_p_pin_code" value="Pin Code: <?php echo $pcode; ?>" readonly>
                    <input type="text" class="box" required name="update_p_price" value="Total Price: <?php echo $tp; ?>" readonly>  
                    <select name="order_status">
                            <option value=""><?php echo $status; ?></option>
                            <option value="Pending">Pending</option>
                            <option value="Processing">Processing</option>
                            <option value="Shipped">Shipped</option>
                            <option value="Delivered">Delivered</option>
                            <option value="Cancelled">Cancelled</option>
                            <option value="Refunded">Refunded</option>
                            <option value="On Hold">On Hold</option>
                        </select>
                </div>

            </div>
                    <input type="submit" value="update the Product" name="update_product" class="btn">
                    <input type="reset" value="cancel" id="close-edit" class="option-btn">
                
            
         </form>
         <?php

         };
         echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
      };
   ?>
    </section>
    <section class="receipt">
    </section>
</div>
<script src="../../assets/JS/script-checkout.js"></script>