<?php 
    session_start();
	include "../includes/db_connect.php";

	$img_name = $_FILES['image']['name'];
	$img_size = $_FILES['image']['size'];
	$tmp_name = $_FILES['image']['tmp_name'];
	$error = $_FILES['image']['error'];

    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
	$description = $_POST['description'];

	if(strlen($name)>50 or strlen($price)>10){
		$_SESSION['error'] = "Some inputs are too long!";
		header("Location: ../admin_add.php");
	} else{
		if ($error === 0) {
			if ($img_size > 300000) {
				$_SESSION['error'] = "Sorry, your file is too large.";
				header("Location: ../admin_add.php");
			}else {
				$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
				$img_ex_lc = strtolower($img_ex);

				$allowed_exs = array("jpg", "jpeg", "png"); 

				if (in_array($img_ex_lc, $allowed_exs)) {
					$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
					$img_upload_path = '../images/'.$new_img_name;
					move_uploaded_file($tmp_name, $img_upload_path);
					
					// Insert into Databas
					$sql = "INSERT INTO products(IMAGE,NAME,PRICE,CATEGORY,CREATE_DATE,DESCRIPTION) 
							VALUES('$new_img_name','$name','$price','$category',CURDATE(),'$description')";
					mysqli_query($link, $sql);
					$_SESSION['success'] = 'Success!';
					header("Location: ../admin_add.php");
				}else {
					$_SESSION['error'] = "You can't upload files of this type";
					header("Location: ../admin_add.php");
				}
			}
		}else {
			$_SESSION['error'] = "unknown error occurred!";
			header("Location: ../admin_add.php");
		}
	}
