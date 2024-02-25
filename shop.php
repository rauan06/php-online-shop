<?
  session_start();
  include 'includes/db_connect.php';
  if(isset($_GET['category'])){
    $category = $_GET['category'];
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
    <?
      include 'parts/header.php';
    ?>
    <!-- end header section -->
  </div>

  <!-- shop section -->

  <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          <?= $category?>
        </h2>
      </div>
      <div class="row">
      <?
          $query = "SELECT products.* 
                    FROM products LEFT JOIN categories 
                    ON products.CATEGORY = categories.CATEGORIES_ID 
                    WHERE categories.NAME = '$category' 
                    ORDER BY products.CREATE_DATE";
          $result = mysqli_query($link, $query);
          
          while($row = mysqli_fetch_array($result)){
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
              <button type="submit" name="single" style="all:unset; cursor: pointer;">Add to cart</button>
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