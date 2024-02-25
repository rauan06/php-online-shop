<?
    include('../includes/db_connect.php');

    $order_id = $_GET['order_id'];
    
    if($_GET["action"] == 'completed')
    {
    $sql = "UPDATE orders SET STATUS = 'Completed' WHERE ORDER_ID = '$order_id'";
    mysqli_query($link,$sql);

    header('Location:../admin.php');
    } else{
        if($_GET["action"] == 'processing')
        {
            $sql = "UPDATE orders SET STATUS = 'Processing' WHERE ORDER_ID = '$order_id'";
            mysqli_query($link,$sql);

            header('Location:../admin.php');
        } else{
            echo "
  				<script>
						alert('Unknown error occured!');
						window.location.assign('../admin.php');
					</script>
  			";
        }
    }
?>