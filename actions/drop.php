<?
    include('../includes/db_connect.php');
    $order_id = $_GET['id'];

    $sql = "DELETE orders,order_details
            FROM products
            INNER JOIN order_details
            ON products.PRODUCT_ID = order_details.PRODUCT_ID
            INNER JOIN orders
            ON orders.ORDER_ID = order_details.ORDER_ID
            INNER JOIN users
            ON orders.USER_ID = users.USER_ID
            WHERE orders.ORDER_ID = '$order_id'";
    
    mysqli_query($link,$sql);
    header('Location:../admin.php');
?>