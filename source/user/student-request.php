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
    <br><br>
<div class="container">
    <h1 style="text-align:center">REQUEST A BOOK</h1>
    <br>
    <div class="st-issuedBook">
        <?php
    
           $res5 = mysqli_query($conn, "select * from user where username='$_SESSION[username]' ");
           while($row5 = mysqli_fetch_array($res5)){
               $fname      = $row5['fname'];
               $mname      = $row5['mname'];
               $lname      = $row5['lname'];        
               $username  = $row5['username'];
               $email     = $row5['email'];
               $contact     = $row5['contact']; 
           }
        ?>
	    <form action="" method="post" class="issue-content">
	    	<table class="table table-bordered table-striped">
	    		<tr>
                    <td>
                      <input type="text" class="form-control" name="name" value="<?php echo $fname ." "; echo $mname ." "; echo $lname ." ";?>" disabled>
                    </td>
                </tr>
                <tr>
                    <td>
                      <input type="text" class="form-control" name="username" value="<?php echo $username; ?>" disabled>
                    </td>
                </tr>
                <tr>
                    <td>
                      <input type="text" class="form-control bdr" name="bname" value="" placeholder="Request book name">
                    </td>
                </tr>
                <tr>
                    <td>
                      <input type="text" class="form-control" name="email" value="<?php echo $email; ?>" disabled>
                    </td>
                </tr>
                <tr>
                    <td>
                      <input type="url" class="form-control bdr" name="burl" value="" pattern="https://.*" placeholder="https://example.com">
                    </td>
                </tr>
            </table>
            <input type="submit" name="submit" value="Send Request" class="btn">

            <?php 
    
	    		if (isset($_POST["submit"])) {
	    			$bname = $_POST['bname'];
	    			$burl = $_POST['burl'];
                    
                    $count = 0;
                    $sql1="SELECT `request-bookname` FROM `requested-books`";
                    $res=mysqli_query($conn,$sql1);
                    
                    if ($bname == "" | $burl =="" ) {
                        echo "<span style='color: red;'><b>Error !</b> Field mustn't be empty</span>";
                    }
                    while($row=mysqli_fetch_assoc($res)){
                        if($row['request-bookname'] == $_POST['bname']){
                            $count+=1;
                        }
                    }
                        if($count==0){
                            $sql = mysqli_query($conn, "INSERT INTO `requested-books` (requestor,username,email,`request-bookname`,`book-url`) 
                            values('$fname $mname $lname','$username','$email','$bname','$burl') ");
                    ?>
                        <script type="text/javascript">
                        document.location='student-request.php';
                        alert("Books request send successfully");   
                        </script>
                    <?php
                        }else{
                    ?>
                        <script type="text/javascript">
                            document.location='student-request.php';
                            alert("The Book Requested is Already Exist. \n The Book is still in process.");
                        </script>
                    <?php
                        }
                    }
                    ?>
	    </form>
    </div>
    </div>
</div>