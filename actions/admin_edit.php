<?

    session_start();
    include '../includes/db_connect.php';

    if(isset($_POST['name'])){
        if(strlen($POST['name']>20)){
            $_SESSION['error'] = "Some inputs are too long!";
            header("Location: ../admin_view.php");

        } else{
                $name = $_POST['name'];
                $sql = "UPDATE products SET NAME = '$name' WHERE PRODUCT_ID = '$ID'";
		        mysqli_query($link, $sql);  
        }
    }