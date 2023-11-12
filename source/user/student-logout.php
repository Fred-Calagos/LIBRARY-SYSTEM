<?php
session_start();
session_destroy();
header('location:../student-index.php');

?>
<?php
    exit;
?>