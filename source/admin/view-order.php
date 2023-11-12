<?php 
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
?>
<div class="home">
    <div class="container">
        
    </div>
</div>