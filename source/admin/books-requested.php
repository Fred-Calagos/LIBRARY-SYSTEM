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
<!-- ------------------------ -->
<br><br>
<h1 style="margin-left:30px">BOOKS REQUESTED</h1>
<br><br>
    <table id="dtBasicExample">
        <thead>
            <tr>
            <th>Requestor</th>
            <th>Username</th>
            <th>Email</th>
            <th>Requested Book</th>
            <th>Books URL</th>
            <th>ACTION</th>

            </tr>
        </thead>

        <tbody>
            <?php
            include '../../inc/connect.php';
            $res = mysqli_query($conn, "select * from `requested-books`");
            while ($row = mysqli_fetch_array($res)) {
                $burl = $row['book-url'];
                echo "<td>";
                echo $row["requestor"];
                echo "</td>";
                echo "<td>";
                echo $row["username"];
                echo "</td>";
                echo "<td>";
                echo $row["email"];
                echo "</td>";
                echo "<td>";
                echo $row["request-bookname"];
                echo "</td>";
                echo "<td>";
                ?><a href="<?php echo $burl; ?>" target="_blank">View</a><?php
                echo "</td>";
                echo "<td>";
                ?><a href="delete-request.php?id=<?php echo $row['id'];?>"> <i class="fas fa-trash delete"></i></a><?php
                echo "</td>";
                echo "</tr>";
                    }
                ?>
        </tbody>
    </table>
<!-- ------------------------ -->
</div>