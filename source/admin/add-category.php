<?php  
session_start();
	# Database Connection File
	include "../../inc/connect.php";
# If the admin is logged in
if (isset($_POST['category'])){
    /** 
	  check if category 
	  name is submitted
	**/
	if (isset($_POST['category_name'])) {
		/** 
		Get data from POST request 
		and store it in var
		**/
		$name = $_POST['category_name'];

		#simple form Validation
		if (empty($name)) {
			$em = "The category name is required";
			header("Location: books.php?error=$em");
            exit;
		}else {
			# Insert Into Database
			$sql  = "INSERT INTO category (category)
			         VALUES (?)";
			$stmt = $conn->prepare($sql);
			$res  = $stmt->execute([$name]);

			/**
		      If there is no error while 
		      inserting the data
		    **/
		     if ($res) {
		     	# success message
		     	$sm = "Successfully created!";
				header("Location: books.php?success=$sm");
	            exit;
		     }else{
		     	# Error message
		     	$em = "Unknown Error Occurred!";
				header("Location: books.php?error=$em");
	            exit;
		     }
		}
	}else {
      header("Location: books.php");
      exit;
	}

}else{
  header("Location: books.php");
  exit;
}