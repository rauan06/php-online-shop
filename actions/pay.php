<?
    session_start();
    include('../includes/db_connect.php');
    
    $country = $_POST['country'];
    $address = $_POST['address'];
    $zip = $_POST['zip'];
    $credit = $_POST['credit'];

    function validatecard($credit)
    {
        global $type;

        $cardtype = array(
            "visa" => "(4\d{12}(?:\d{3})?)",
            "amex" => "(3[47]\d{13})",
            "jcb" => "(35[2-8][89]\d\d\d{10})",
            "maestro" => "((?:5020|5038|6304|6579|6761)\d{12}(?:\d\d)?)",
            "solo" => "((?:6334|6767)\d{12}(?:\d\d)?\d?)",
            "mastercard" => "(5[1-5]\d{14})",
            "switch" => "(?:(?:(?:4903|4905|4911|4936|6333|6759)\d{12})|(?:(?:564182|633110)\d{10})(\d\d)?\d?)",
        );

        if (preg_match($cardtype['visa'],$credit))
        {
        $type= "visa";
            return 'visa';
        
        }
        else if (preg_match($cardtype['amex'],$credit))
        {
        $type= "amex";
            return 'amex';
        }
        else if (preg_match($cardtype['jcb'],$credit))
        {
        $type= "jcb";
            return 'jcb';
        
        }
        else if (preg_match($cardtype['maestro'],$credit))
        {
        $type= "maestro";
            return 'maestro';
        }
        else if (preg_match($cardtype['solo'],$credit))
        {
        $type= "solo";
            return 'solo';
        }
        else if (preg_match($cardtype['mastercard'],$credit))
        {
        $type= "mastercard";
            return 'mastercard';
        }   
        else
        {
            return false;
        } 
    }

    validatecard($credit);

    if (validatecard($credit) == false)
    {
        $_SESSION['success'] = 'Your will recieve your order soon!';
        $user_id = $_SESSION['id'];

        $sql = "INSERT INTO orders(ADDRESS,DATE,STATUS,USER_ID) VALUES('$address',CURDATE(),'Processing','$user_id')";
        mysqli_query($link, $sql);
        
        $query = "  SELECT * FROM orders 
                    WHERE USER_ID = '$user_id' &&
                    ORDER_ID=(SELECT max(ORDER_ID) FROM orders);"; 
	    $result = mysqli_query($link, $query);

        $row = mysqli_fetch_array($result);
        $order_id = $row['ORDER_ID'];
        
        foreach($_SESSION['cart'] as $keys => $values)
        {   
            $product_id = $values['id'];
            $price = $values['price'];
            $quantity = $values['quantity'];

           $sql = "INSERT INTO order_details(ORDER_ID,PRODUCT_ID,PRICE,QUANTITY) VALUES('$order_id','$product_id','$price','$quantity')";
           mysqli_query($link, $sql);

        }
        
        unset($_SESSION['cart']);
        header('Location: ../checkout.php');
    }   else{
        $_SESSION['error'] = 'Credit card number is invalid';
        header('Location: ../checkout.php');
        }
    
?>