<?php
session_start();
if (!isset($_SESSION["username"])) {
    ?>
        <script type="text/javascript">
            window.location="../../login.php";
        </script>
    <?php
}
    include '../../inc/header.php';
    include '../../inc/connect.php';
?>
<div class="home">
    <div class="container">
        <div class="content-dashboard">
        <h1>REPORT</h1>
            <div class="flex-container1">
               
                <div class="flex-row">
                    <a href="user-report.php">
                    <h1>USER</h1>
                    <?php
      
                            $select_rows = mysqli_query($conn, "SELECT * FROM `user`") or die('query failed');
                            $row_count = mysqli_num_rows($select_rows);

                            ?>

                            <span style="font-size:20px;"><?php echo $row_count; ?></span>

                            <div id="menu-btn" class="fas fa-bars"></div><br>
                        <?php

                        if(isset($message)){
                        foreach($message as $message){
                            echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
                        };
                        };

                    ?>
                    </a>
                </div>
                <div class="flex-row">
                <a href="book-report.php">
                    <h1>BOOKS</h1>
                    <?php
      
                            $select_rows = mysqli_query($conn, "SELECT * FROM `add-books`") or die('query failed');
                            $row_count = mysqli_num_rows($select_rows);

                            ?>

                            <span style="font-size:20px;"><?php echo $row_count; ?></span>

                            <div id="menu-btn" class="fas fa-bars"></div><br>
                        <?php

                        if(isset($message)){
                        foreach($message as $message){
                            echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
                        };
                        };

                    ?>
                    </a>
                </div>
                <div class="flex-row">
                <?php
                    $select_rows = mysqli_query($conn, "SELECT * FROM `user-order`") or die('query failed');
                    $row_count = mysqli_num_rows($select_rows);
                ?>

                 
                <a href="sales-report.php">
                    <h1>SALES</h1>
                    <span style="font-size:20px;"><?php echo $row_count; ?></span>
                    </a>
                </div>
        </div>
    </div>
</div>