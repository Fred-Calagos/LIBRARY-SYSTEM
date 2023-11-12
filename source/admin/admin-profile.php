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

    $query = mysqli_query($conn, "select * from `admin` where `id` = `id`");
    while($row=mysqli_fetch_array($query))
    {
       $id = $row['id'];
       $fname = $row['FullName'];
       $email = $row['AdminEmail'];
       $username = $row['UserName'];
       $password = $row['Password'];
       $update = $row['updationDate'];

    }
    
?>

<div class="home">
    <BR>
<div class="grid-container">
    <div class="grid-item">

        <!-- ====================== IMAGE TAG ========================== -->
        <div class="photo">

            <?php
                $res = mysqli_query($conn, "select * from admin where UserName='".$_SESSION['username']."'");
                    while ($row = mysqli_fetch_array($res))
                    {
                        ?><img src="<?php echo $row["admin_profile"]; ?> " height="200" width="200" style="text-align:center;border-radius:50%;border:2px solid black" alt="something wrong"></a> <?php
                    }
            ?>

        </div>
        <!-- =================================== SELECT AND UPLOAD BUTTON FOR PROFILE ======================== -->

            <div class="uploadPhoto">
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="file" name="image" accept="image/png, image/gif, image/jpeg" class="modal-mt" id="image">
                        <div class="gap-30"></div>
                        <input type="submit" class="modal-mt btn btn-info" value="Upload Image" name="submit_admin">
                    </form>

                        </div>
                            <?php 
                                if (isset($_POST["submit_admin"])) {
                                    $image_name=$_FILES['image']['name'];
                                    $temp = explode(".", $image_name);
                                    $newfilename = round(microtime(true)) . '.' . end($temp);
                                    $imagepath="../../image/image-admin/".$newfilename;
                                    move_uploaded_file($_FILES["image"]["tmp_name"],$imagepath);
                                    mysqli_query($conn, "update admin set `admin_profile`='".$imagepath."' where UserName='".$_SESSION['username']."'");

                            ?>
                                        <script type="text/javascript">
                                            window.location="admin-profile.php";
                                        </script>
                            <?php
                            }
                            ?>
            </div>
    <div class="grid-item">

    <BR><br>

        <!-- ADMIN CONTROL PANEL -->
        <!-- ================================ ADMIN PROFILE ========================================-->


            <div class="admin-content">

                <?php
                    $query=mysqli_query($conn,"select * from `admin` where `id` = '$id'");
                    while($row=mysqli_fetch_array($query))
                    {
                ?>
                    <form method="post">
                        <label for="fullname">FULLNAME: </label>
                        <input type="text" name="fullname" value="<?php echo $row['FullName'];?>" disabled><br>
                        <label for="email">EMAIL </label>
                        <input type="text" name="email" value="<?php echo $row['AdminEmail'];?>" disabled><br>
                        <label for="username">USERNAME</label>
                        <input type="text" name="username" value="<?php echo $row['UserName'];?>" disabled><br>
                        <label for="password">PASSWORD</label>
                        <input type="password" name="password" value="<?php echo $row['Password'];?>" disabled><br>
                        <label for="updation">UPDATE</label>
                        <input type="text" name="updation" value="<?php echo $row['updationDate'];?>" disabled><br>
                    </form>
                <?php
                }
                ?>
            </div>
                <!--============================== Modal for UPDATE Admin ============================  -->

                    <button type="button" id="edit-admin-profile">EDIT</button><br><br>

            <div id="modal_container_edit" class="modal-container-edit">
                <div class="modal-content-edit">
                    <h3 class="edit-table_update">UPDATE ADMIN</h3><br>
                    <hr style="height:3px;background-color:white;border:none;">
                        <br><br>
                        <form action="../../library/crud/crud-update-admin.php" method="post">
                                <input type="hidden" name="id" value=   "<?php echo $id;?>">
                            <label for="fullname">FULLNAME: </label>
                                <input type="text" name="fullname" value="<?php echo $fname;?>"><br><br>
                            <label for="email">EMAIL </label>
                                <input type="text" name="email" value="<?php echo $email;?>"><br><br>
                            <label for="username">USERNAME</label>
                                <input type="text" name="username" value="<?php echo $username;?>"><br><br>
                            <label for="password">PASSWORD</label>
                                <input type="password" name="password" value="<?php echo $password;?>"><br><br>
                            <button type="button" id="close-edit">Close</button>
                                <input type="submit" name="update" value="EDIT" id="update-edit">
                        </form>
                    <br><br>

                    <script src="../../assets/JS/function-edit.js"></script>
                </div>
            </div>
        </div>
    </div>

</div>


