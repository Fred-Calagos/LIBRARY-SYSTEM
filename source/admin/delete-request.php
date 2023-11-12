<?php
    session_start();
    include '../../inc/connect.php';
    $id = $_GET["id"];
        mysqli_query($conn, "delete from `requested-books` where id=$id");

        ?>
        <script type="text/javascript">
            window.location="books-requested.php";
        </script>
        <?php
?>