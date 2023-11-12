<?php 
		session_start();
        if (!isset($_SESSION["username"])) {
            ?>
                <script type="text/javascript">
                    window.location="../../admin-login.php";
                </script>
            <?php
        }
        include '../../inc/connect.php';
?>
<head>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link href="../../assets/fontawesome/web-fonts-with-css/css/fontawesome-all.css" rel="stylesheet">
</head>
    <br>

<div class="user_report_container">
    <div class="user_container">
        <div class="book-container-btn">
            <form action="" method="post" name="form1">
                <input type="text" name="search" class="form-control" placeholder="Enter book name">
				<input type="submit" name="submit1" class="btn btn-info" value="Search Book">
            </form>
            <div class="ur_btn">
                <a href="reports.php" id="adashbtn"><i class="fas fa-list-ol icon"></i> REPORTS</a>   
                <button id="print_user"><i class="fas fa-print icon"></i> PRINT</button><br><br>
            </div>
        </div>
        <div class="user_content">
            <div class="user_report" id="user_report">
                <table id="dtBasicExample">
                    <thead>
                        <tr>
                            <th>User Profile</th>
                            <th>Fullname</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Email</th>
                            <th>Contact</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../../inc/connect.php';
                        if (isset($_POST["submit1"])){
                            $i=0;
                            $res = mysqli_query($conn,"select * from `user` where fname like('$_POST[search]%') 
                                or mname like('$_POST[search]%') 
                                or lname like('$_POST[search]%')
                                or stree like('$_POST[search]%')");
                                while ($row = mysqli_fetch_array($res)) {
                                    $i+=1;
                                ?>
                                    <tr>
                                    <td><img src="<?php echo $row["user-profile"];?>" height="100" width="100" alt=""></td>
                                    <td><?php echo $row["fname"]." ".$row["mname"]." ".$row["lname"];?></td>
                                    <td><?php echo $row["username"];?></td>
                                    <td style="-webkit-text-security: square;"><?php echo $row["password"];?></td>
                                    <td><?php echo $row["email"];?></td>
                                    <td><?php echo $row["contact"]; ?></td>
                                    </tr>
                        <?php
                        }
                        ?>
                            </tbody>
                            </table>
                        <?php
                    }else{
                        $i=0;
                        $res = mysqli_query($conn,"select * from `user` where id= id");
                        while ($row = mysqli_fetch_array($res)){
                            $i=$i+1;
                            ?>
                            <tr>
                            <td><img src="<?php echo $row["user-profile"];?>" height="100" width="100" alt=""></td>
                            <td><?php echo $row["fname"]; echo $row["mname"]; echo $row["lname"];?></td>
                            <td><?php echo $row["username"];?></td>
                            <td style="-webkit-text-security: square;"><?php echo $row["password"];?></td>
                            <td><?php echo $row["email"];?></td>
                            <td><?php echo $row["contact"]; ?></td>
                            </tr>
                    <?php
                        }
                    }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
            const printBTN = document.getElementById("print_user");

            printBTN.addEventListener('click', function(){
                print()
            })
    </script>