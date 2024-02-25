<?
  session_start();
  include('includes/db_connect.php');
  if(isset($_SESSION['role'])){
    if($_SESSION['role'] !== 'admin'){
      header('Location:404.php');
    }
  } else{
      header('Location:404.php');
  }
?>

  <!DOCTYPE html>
  <html lang="en">

  <!-- head section starts -->
    <?
      include 'parts/head.php';
    ?>
  <!-- head section ends -->

  <body class="sub_page">

    <div class="hero_area">

      <!-- header section strats -->
      <header class="header_section">
        <div class="container-fluid">
          <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="index.php">
              <span>
                Ozgeshop
              </span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class=""> </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="index.php"><i class="fa fa-home" aria-hidden="true"></i> home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="admin.php"><i class="fa fa-th-large" aria-hidden="true"></i> orders</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="admin_view.php"><i class="fa fa-tasks" aria-hidden="true"></i> view products</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="admin_add.php"><i class="fa fa-plus-square" aria-hidden="true"></i> add products</a>
                </li>
              </ul>
              <div class="user_option-box">
                <a href="login.php">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </a>
                <a href="cart.php">
                  <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                </a>
                <?
                  if(isset($_SESSION['role'])){
                    echo '
                      <a href="actions/logout.php">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                      </a>
                      ';
                    } else{
                      echo '
                        <a href="login.php">
                          <i class="fa fa-user" aria-hidden="true"></i>
                        </a>
                      ';
                  }
                ?>
              </div>
            </div>
          </nav>
        </div>
      </header>
      <!-- end header section -->
    </div>

    <!-- shop section1 -->
    <section class="shop_section layout_padding" style="min-height: 60vh;">
      <div class="container">
        <div class="heading_container heading_center">
          <h2>
            <?
              $sql = "SELECT ORDER_ID FROM `orders`";
              $result = mysqli_query($link,$sql);
              
              $row = mysqli_fetch_array($result);
              if(empty($row['ORDER_ID'])){
                echo 'No orders yet';
              }
              else{
                echo'All Orders';
              }
            ?>
          </h2>
        </div>
        <?
            $sql = "SELECT ORDER_ID FROM `orders`";
            $action = mysqli_query($link, $sql);

            while($row = mysqli_fetch_array($action)){
            $order_id = $row['ORDER_ID'];

          ?>
        <section class="shoping-cart spad">
          <div class="container">
              <div class="row">
                  <div class="col-lg-12">
                      <div class="shoping__cart__table">
                          <table>
                              <thead>
                                <?
                                  $query = "SELECT *
                                  FROM `products`
                                  INNER JOIN order_details
                                  ON products.PRODUCT_ID = order_details.PRODUCT_ID
                                  INNER JOIN orders
                                  ON orders.ORDER_ID = order_details.ORDER_ID
                                  INNER JOIN users
                                  ON orders.USER_ID = users.USER_ID
                                  WHERE orders.ORDER_ID = '$order_id' 
                                  ORDER BY `orders`.`DATE` ASC";
                                  $result = mysqli_query($link, $query);
                                  $row = mysqli_fetch_array($result);
                                  $date = $row['DATE'];
                                  $user_name = $row['USER_NAME'];
                                  $phone = $row['PHONE'];
                                  $address = $row['ADDRESS'];
                                ?>
                                  <tr>
                                      <th class="shoping__product">
                                        <h2>Order ID: <?= $order_id?></h2>               
                                        <h6><b>Name: </b><?= $user_name?></h6>
                                        <h6><b>Phone: </b><?= $phone?></h6>
                                        <h6><b>Address: </b><?= $address?></h6>
                                        <h6><b>Date: </b><?= $date?></h6>
                                      </th>
                                      <th>Status</th>
                                      <th>Quantity</th>
                                      <th>Total</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?

                                  $result = mysqli_query($link, $query);
                                  while($row = mysqli_fetch_array($result)){
                                  $image = $row['IMAGE'];
                                  $price = $row['PRICE'];
                                  $product_name = $row['NAME'];
                                  $status = $row['STATUS'];
                                  $quantity = $row['QUANTITY'];
                                ?>
                                  <tr>
                                      <td class="shoping__cart__item">
                                        <img src="images/<?= $image?>" style="width: 100px; height: 100px; margin: 0 25px 0 0;" alt="">
                                        <h5><?= $product_name?></h5>
                                      </td>
                                      <td class="shoping__cart__price" style="font-weight:400;">
                                          <?= $status?>
                                      </td>
                                      <td class="shoping__cart__quantity">
                                        <?= $quantity?>
                                      </td>
                                      <td class="shoping__cart__price">
                                          $ <?
                                           $total = $price *  $quantity;
                                           echo  number_format($total, 2);
                                           ?>
                                  </tr>
                                  <? } ?>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-lg-12">
                      <div class="shoping__cart__btns">
                          <a href="actions/drop.php?id=<?= $order_id?>" class="primary-btn cart-btn" style="background-color: #e6c511; color:white;  border-radius: 5px">Drop order</a>
                          <a href="actions/update.php?action=<?
                            if($status == 'Completed'){
                              echo 'processing';
                            } else{
                              echo 'completed';
                            }
                          ?>&&order_id=<?= $order_id?>" class="primary-btn cart-btn cart-btn-right" style="margin-top: -14px; background-color: #e6c511; color:white;  border-radius: 5px"><span class="icon_loading"></span>
                              Update</a>
                      </div>
                  </div>
              </div>
          </div>
          <? } ?>
      </section>
      </div>
    </section>
    <!-- end shop section -->
    <!-- footer section -->
    <?
      include 'parts/footer.php';
    ?>
    <!-- footer section -->

    <!-- jQery -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.js"></script>
    <!-- owl slider -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
    </script>
    <!-- custom js -->
    <script src="js/custom.js"></script>

  </body>

  </html>