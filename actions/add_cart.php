<?

    session_start();
    include('../includes/db_connect.php');

    #Checking whether the user is authorized
    if(!isset($_SESSION['id'])){
        $_SESSION['error'] = 'You need to register or login to use cart!';
        header('Location: ../single.php');
    } else{
    if(isset($_POST['add']))
    {
    if(isset($_SESSION['cart']))
	{   
        #Checking whether the product is already in the cart
		$item_array_id = array_column($_SESSION['cart'], 'id');
		if(!in_array($_POST['id'], $item_array_id))
		{   
            #Creating an array with product data and locating this array in the cart's array
			$count = count($_SESSION["cart"]);
			$product = array(
				'id'			=>	$_POST['id'],
				'name'			=>	$_POST['name'],
				'price'		    =>	$_POST['price'],
				'image'		    =>	$_POST['image'],
                'quantity'      => $_POST['quantity'],
			);
            #Example of 2 dimensional arrays
			$_SESSION['cart'][$count] = $product;
            $_SESSION['success'] = 'Product added to your card!';
            header('Location: ../single.php');
		}else{
            $_SESSION['error'] = 'Product is already in your cart!';
            header('Location: ../single.php');
        }
    }else
    {
        $product = [
            'id'            => $_POST['id'],
            'name'          => $_POST['name'],
            'price'         => $_POST['price'],
            'image'         => $_POST['image'],
            'quantity'      => $_POST['quantity'],
        ];
        $_SESSION['cart'][0] = $product;
        $_SESSION['success'] = 'Product added to your card!';
        header('Location: ../single.php');
    }}
    if(isset($_GET["action"]))
    {
        if($_GET["action"] == "delete")
        {
            foreach($_SESSION["cart"] as $keys => $values)
            {
                if($values["id"] == $_GET["id"])
                {
                    unset($_SESSION['cart'][$keys]);
                    header('Location: ../cart.php');
                }
            }
        }
    }}