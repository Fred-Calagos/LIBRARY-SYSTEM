<?php  
session_start();
include "inc/connect.php";

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role'])) {

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	$username = test_input($_POST['username']);
	$password = test_input($_POST['password']);
	$role = test_input($_POST['role']);

	if (empty($username)) {
		header("Location:index.php?error=User Name is Required");
	}else if (empty($password)) {
		header("Location: index.php?error=Password is Required");
	}else {

		// Hashing the password
		// $password = md5($password);
        if ($role === 'user') {
			$sql = "SELECT * FROM user WHERE username='$username' AND `password`='$password'";
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
				// the user name must be unique
				$row = mysqli_fetch_assoc($result);
				if ($row['password'] === $password && $row['role'] === $role) {
					$_SESSION['name'] = $row['fname'];
					$_SESSION['id'] = $row['id'];
					$_SESSION['role'] = $row['role'];
					$_SESSION['username'] = $row['username'];

					header("Location: source/user/student-dashboard.php");

				}else {
					header("Location:index.php?error=Incorect User nasdame or password");
				}
			}else {
				header("Location:index.php?error=Incorrect User name or password");
			}
		}elseif ($role === 'admin') {

			$sql1 = "SELECT * FROM `admin` WHERE UserName='$username' AND Password='$password' AND role = '$role'";
			$result1 = mysqli_query($conn, $sql1);

			if (mysqli_num_rows($result1) > 0) {
				// the user name must be unique
				$row1 = mysqli_fetch_assoc($result1);
				if ($row1['Password'] === $password && $row1['role'] === $role) {
					$_SESSION['FullName'] = $row1['FullName'];
					$_SESSION['id'] = $row1['id'];
					$_SESSION['role'] = $row1['role'];
					$_SESSION['username'] = $row1['UserName'];

					header("Location: source/admin/dashboard.php");

				}else {
					header("Location:index.php?error=Incorect User nasdame or password");
				}
			}else {
				header("Location:index.php?error=Incorrect User name or password");
			}
		}
	}
	
}else {
	header("Location: index.php");
}