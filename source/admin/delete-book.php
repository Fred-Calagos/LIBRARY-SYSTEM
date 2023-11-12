<?php
    session_start();
    include '../../inc/connect.php';
    $id = $_GET["id"];
        mysqli_query($conn, "delete from `add-books` where id=$id");

        ?>
        <script type="text/javascript">
            window.location="books.php";
        </script>
        <?php
?>