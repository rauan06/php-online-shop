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
      <!-- shop section2 -->
      <section class="shop_section layout_padding">
      <div class="container">
        <div class="heading_container heading_center">
          <h2>
            All products
          </h2>
          Sort by category:
        </div>
        <div class="btn-box" style="margin-top: -10px;">
          <a href="admin_view.php" type="submit"  style="margin: 5px;">
            All
          </a>
          <a href="admin_view.php?category=1" type="submit"  style="margin: 5px;">
            Mens
          </a>
          <a href="admin_view.php?category=2" type="submit"  style="margin: 5px;">
            Womens
          </a>
          <a href="admin_view.php?category=3" type="submit"  style="margin: 5px;">
            Accessories
          </a>
        </div>
        <div class="row">
          <?
            if(isset($_GET['category'])){
              $category = $_GET['category'];
              $sql = "SELECT * FROM products WHERE category = '$category'";
            } else{
              $sql = "SELECT * FROM products";
            }
            $result = mysqli_query($link,$sql);
            while($row = mysqli_fetch_array($result)){
              $id = $row['PRODUCT_ID'];
              $name = $row['NAME'];
              $price = $row['PRICE'];
              $image = $row['IMAGE'];
          ?>
          <div class="col-sm-6 col-xl-3">
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
                      $ <?= $price?>
                    </span>
                  </h6>
                </div>
                <div class="new">
                  <span>
                    <a href="edit_item.php?id=<?= $id?>" style="color:white;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>  
                  </span>
                  <span style="margin-left: 25px;">
                      <a href="actions/delete_item.php?id=<?= $id?>"  onclick="return confirm('Are you sure want to delete this item?')" style="color:white;"><i class="fa fa-ban" aria-hidden="true"></i></a>  
                  </span>
                </div>
            </div>
          </div>
          <? } ?>
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

  </body>

  </html>