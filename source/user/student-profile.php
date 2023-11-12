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
    <div class="profile-container">
        <div class="pic-container">
        <div class="grid-container">
            <div class="grid-item">
            <div class="photo">

                <!-- PROFILE PICTURE OF THE USER -->

                    <?php
                        $res = mysqli_query($conn, "SELECT * from user where username='".$_SESSION['username']."'");
                            while ($row = mysqli_fetch_array($res))
                            {
                                ?><img src="<?php echo $row["user-profile"]; ?> " alt="something wrong"></a> <?php
                            }
                                ?>
                </div>


                    <div class="uploadPhoto">
                            <form action="" method="post" enctype="multipart/form-data">
                                <input type="file" name="image" accept="image/png, image/gif, image/jpeg" class="modal-mt" id="image">
                                <div class="gap-30"></div>
                                <input type="submit" class="modal-mt btn btn-info" value="Upload Image" name="submit">
                            </form>
                    </div>
                            <?php 
                                if (isset($_POST["submit"])) {
                                    $image_name=$_FILES['image']['name'];
                                    $temp = explode(".", $image_name);
                                    $newfilename = round(microtime(true)) . '.' . end($temp);
                                    $imagepath="../../image/image-user/".$newfilename;
                                    move_uploaded_file($_FILES["image"]["tmp_name"],$imagepath);
                                    mysqli_query($conn, "update user set `user-profile`='".$imagepath."' where username='".$_SESSION['username']."'");

                            ?>
                                        <script type="text/javascript">
                                            window.location="student-profile.php";
                                        </script>
                            <?php
                            }
                            ?>
            </div>
            <div class="grid-item">
                
            <!-- DETAILS OF THE USER -->

            <div class="details">
                    <?php
                    $res5 = mysqli_query($conn, "select * from user where username='$_SESSION[username]' ");
                    while($row5 = mysqli_fetch_array($res5)){
                            $fname      = $row5['fname'];
                            $mname      = $row5['mname'];
                            $lname      = $row5['lname'];
                            $username   = $row5['username'];
                            $pword      = $row5['password'];
                            $email      = $row5['email'];
                            $contact    = $row5['contact'];
                    }
                    ?>
                    <form method="post">
                        <div class="form-group">
                            <label for="fname" class="text-right">First Name:</label>
                            <input type="text" class="form-control custom"  name="fname" value="<?php echo $fname;?>">
                            <label for="mname" class="text-right">Middle Name:</label>
                            <input type="text" class="form-control custom"  name="mname" value="<?php echo $mname;?>">
                            <label for="lname" class="text-right">Last Name:</label>
                            <input type="text" class="form-control custom"  name="lname" value="<?php echo $lname;?>">
                        </div>
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control custom" placeholder="Username" name="username" value="<?php echo $username; ?>" disabled />
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control custom"  name="password" value="<?php echo $pword; ?>" disabled />
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" class="form-control custom"  name="email" value="<?php echo $email; ?>" disabled />
                        </div>
                        <div class="form-group">
                            <label for="contact">Contact No:</label>
                            <input type="text" class="form-control custom"  name="contact" value="<?php echo $contact; ?>" />
                        </div> 
                        <div class="text-right mt-20">
                            <input type="submit" value="Save" class="btn btn-info" name="update">
                        </div>
                    </form>
                </div> 
            </div>
        </div>

            </div>

                <?php
                if (isset($_POST["update"])){
                    mysqli_query($conn, "UPDATE user set
                    contact='$_POST[contact]', fname='$_POST[fname]', mname='$_POST[mname]', lname='$_POST[lname]'
                    where username = '$_SESSION[username]'");
                        ?>
                            <script type="text/javascript">
                                window.location="student-profile.php";
                            </script>
                        <?php
                }
                ?>
    </div>
</div>