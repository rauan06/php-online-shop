<?
  session_start();
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
    <?
      include 'parts/header.php';
    ?>
<!-- end header-->
<section class="shoping-cart spad" style="min-height: 60vh;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <? if(!empty($_SESSION['cart'])){
                                    $total = 0;
                                    foreach($_SESSION['cart'] as $keys => $values)
                                    {
                                ?>
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="images/<?= $values['image']?>" style="width: 100px; height: 100px; margin: 0 25px 0 0;" alt="">
                                        <h5><?= $values["name"]?></h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                       $ <?= number_format($values["price"], 2);?>
                                    </td>
                                    <td class="shoping__cart__price">
                                            <?= $values['quantity']?>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__price">
                                       $ <?= number_format($values['quantity'] * $values["price"], 2);?>
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <a href="actions/add_cart.php?action=delete&id=<?= $values["id"]; ?>">
                                        <span class="icon_close">
                                          X
                                        </span>
                                        </a>
                                    </td>
                                    </tr>
                                    <?$total = $total + ($values["quantity"] * $values["price"]);}?>
                                <tr>
                                  <td class="shoping__cart__item">
                                    </td>
                                    <td class="shoping__cart__price">
                                    </td>
                                    <td class="shoping__cart__quantity">
                                    </td>
                                  <td class="shoping__cart__price">
                                        Total: $ <?= number_format($total, 2);?>
                                    </td>
                                </tr>
                                <?}else{echo'<h2 style="padding-bottom:10px; color:#e6c511">Your cart is empty</h2>';}?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="index.php" class="primary-btn cart-btn" style="background-color: #e6c511; color:white;  border-radius: 5px">BACK</a>
                        <a href="checkout.php" class="primary-btn cart-btn cart-btn-right" style="margin-top: -14px; background-color: #e6c511; color:white;  border-radius: 5px"><span class="icon_loading"></span>
                            CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
  <!--footer-->
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