<?
  session_start();
  include "includes/db_connect.php";
?>

<!DOCTYPE html>
<html lang="en">

<!-- head section starts -->
  <?
    include 'parts/head.php';
  ?>
<!-- head section ends -->

<body>
  <div class="hero_area">
    <div class="hero_social">
      <a href="">
        <i class="fa fa-facebook" aria-hidden="true"></i>
      </a>
      <a href="">
        <i class="fa fa-twitter" aria-hidden="true"></i>
      </a>
      <a href="">
        <i class="fa fa-linkedin" aria-hidden="true"></i>
      </a>
      <a href="">
        <i class="fa fa-instagram" aria-hidden="true"></i>
      </a>
    </div>
    <!-- header section strats -->
    <?
      include 'parts/header.php';
    ?>
    <!-- end header section -->
    <!-- slider section -->
    <section class="slider_section " style="background-image: url(images/bg.jpg);  background-size: cover;">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container-fluid ">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                    <h1>
                      Mens clothing
                    </h1>
                    <p>
                      Aenean scelerisque felis ut orci condimentum laoreet. Integer nisi nisl, convallis et augue sit amet, lobortis semper quam.
                    </p>
                    <div class="btn-box">
                      <a href="shop.php?category=Mens" class="btn1">
                        Shop now
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="images/slider-img.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item ">
            <div class="container-fluid ">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                    <h1>
                      Womens clothing
                    </h1>
                    <p>
                      Aenean scelerisque felis ut orci condimentum laoreet. Integer nisi nisl, convallis et augue sit amet, lobortis semper quam.
                    </p>
                    <div class="btn-box">
                      <a href="shop.php?category=Womens" class="btn1">
                        Shop now
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="images/slider-img.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item ">
            <div class="container-fluid ">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                    <h1>
                      Accessories
                    </h1>
                    <p>
                      Aenean scelerisque felis ut orci condimentum laoreet. Integer nisi nisl, convallis et augue sit amet, lobortis semper quam.
                    </p>
                    <div class="btn-box">
                      <a href="shop.php?category=Accessories" class="btn1">
                         Shop now
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="images/slider-img.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <ol class="carousel-indicators">
          <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
          <li data-target="#customCarousel1" data-slide-to="1"></li>
          <li data-target="#customCarousel1" data-slide-to="2"></li>
        </ol>
      </div>

    </section>
    <!-- end slider section -->
  </div>

  <!-- shop section -->

  <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>Latest items</h2>
      </div>
      <div class="row">
      <?
          $query = "SELECT * 
                    FROM products
                    ORDER BY `products`.`CREATE_DATE` DESC";
          $result = mysqli_query($link, $query);
          
          $n = 0;
          while($row = mysqli_fetch_array($result) AND $n<4){
            $n = $n+1;
            $id = $row['PRODUCT_ID'];
            $image = $row['IMAGE'];
            $name = $row['NAME'];
            $price = $row['PRICE'];
            $description = $row['DESCRIPTION'];
        ?>
        <div class="col-md-6">
          <form action="single.php" method="POST">
          <div class="box">
              <div class="img-box">
                <img src="images/<?= $image?>" alt="">
              </div>
              <div class="detail-box">
                <h6>
                  <?= $name?>
                </h6>
                <h6>
                  Price:
                  <span>
                    $<?= $price?>
                  </span>
                </h6>
              </div>
              <div class="new">
                <input type="hidden" name="id" value="<?= $id?>"></input>
                <input type="hidden" name="name" value="<?= $name?>"></input>
                <input type="hidden" name="price" value="<?= $price?>"></input>
                <input type="hidden" name="image" value="<?= $image?>"></input>
                <input type="hidden" name="description" value="<?= $description?>"></input>
              <button type="submit" name="single" value="1" style="all:unset; cursor: pointer;">Add to cart</button>
          </div>
          </div>
          </button>
          </form>
        </div>
        <? }?>
      </div>
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
<div class="popup-bg">
     <div class="popup">
          <p>Product added to your cart</p>
     </div>
</div>
</body>

</html>