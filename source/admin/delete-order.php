<?php
    session_start();
    include '../../inc/connect.php';
    $id = $_GET["id"];
        mysqli_query($conn, "delete from `user-order` where id=$id");

        ?>
        <script type="text/javascript">
            window.location="checkout.php";
        </script>
        <?php
?>