<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "root", "library");
$output = '';
$pagi = '';



    if(isset($_POST["query"]))
        {
        $search = mysqli_real_escape_string($connect, $_POST["query"]);
        $query = "
        SELECT * FROM `user` 
        WHERE fname LIKE '%".$search."%'
        OR lname LIKE '%".$search."%'
        ";
        }
    else
    {
    $query = "SELECT * FROM `user` ORDER BY id asc";
    }

    $result = mysqli_query($connect, $query);
    if(mysqli_num_rows($result) > 0)
        {

            $output .= '
            <div class="table-responsive">
                <section class="header">
                    <div class="items-controller">
                    <h5>Show</h5>
                    <select name="" id="itemperpage">
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="08" selected>08</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                </select>
                <h5>Per Page</h5>
            </div>
            <table id="dtBasicExample">
            <thead>
                <tr>
                    <th>User Profile</th>
                    <th>Fullname</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Action</th>
                </tr>
            </thead>
            ';

        while($row = mysqli_fetch_array($result))
        {
            $output .= '
            <tr>
                <td><img src="'.$row["user-profile"].'" height="100" width="100" alt=""></td>
                <td>'.$row["fname"].' '.$row["mname"].' '.$row["lname"].'</td>
                <td>'.$row["username"].'</td>
                <td style="-webkit-text-security: square;">'.$row["password"].'</td>
                <td>'.$row["email"].'</td>
                <td>'.$row["contact"].'</td>
                <td>
                    <a href="delete-user.php?id='.$row['id'].'"> <i class="fas fa-trash delete"></i></a>
                </td>
            </tr>
            ';
        }
        $output .= '
            </table>
                </div>
                <div class="bottom-field">      
                    <ul class="pagination">
                        <li class="prev\"><a href="#" id="prev">&#139;</a></li>
                            <!-- page number here -->
                        <li class="next"><a href="#" id="next">&#155;</a></li>
                    </ul>
                </div>
        <script src="../../assets/JS/main.js"></script>
    ';

            echo $output;
        }
    else
        {
                echo 'Data Not Found';
        }

    ?>
