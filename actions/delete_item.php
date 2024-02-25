<?
    include('../includes/db_connect.php');
    
    $id = $_GET['id'];

    $sql = "DELETE FROM products WHERE PRODUCT_ID = '$id'";
    mysqli_query($link,$sql);

    header('Location:../admin_view.php');
?>