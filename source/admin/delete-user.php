<?php
    session_start();
    include '../../inc/connect.php';
    $id = $_GET["id"];
        mysqli_query($conn, "delete from `user` where id=$id");

        ?>
        <script type="text/javascript">
            window.location="users-info.php";
        </script>
        <?php
?>