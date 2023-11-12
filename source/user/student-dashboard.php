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
    <div class="container_stud_dash">
        <h1>WELCOME TO AKLATAN</h1>
    </div>
</div>
