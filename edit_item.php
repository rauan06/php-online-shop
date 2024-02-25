<?
  session_start();
  include('includes/db_connect.php');
  if(isset($_SESSION['role'])){
    if($_SESSION['role'] !== 'admin'){
      header('Location:404.php');
    }
  }else{
      header('Location:404.php');
    }
  if(empty($_GET['id'])){
    header('Location:404.php');
  } else{
    $id = $_GET['id'];

    $sql = "SELECT * FROM products WHERE PRODUCT_ID = $id";
    $result = mysqli_query($link,$sql);
    $row = mysqli_fetch_array($result);

    if(empty($row['PRODUCT_ID'])){
      header('Location:404.php');
    }
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
                Timups
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
      <!-- shop section3 -->
      <section class="contact_section layout" style="padding-top: 40px; padding-bottom: 40px;">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="form_container">
            <div class="heading_container">
              <h2>
                Edit item: <?= $row['NAME']?>
              </h2>
            </div>
            <form action="actions/admin_handler.php" method="POST"  enctype="multipart/form-data">
            <?
              if(isset($_SESSION['error'])){
                echo'<div><p class="text-danger" style="background-color: #E4C4C4; margin: 20px 0px;padding: 10px 20px; ">';
                echo $_SESSION['error'];
                unset($_SESSION['error']);
                echo '</p></div>';
              } else{ 
                  if(isset($_SESSION['success'])){
                    echo '<div><p class="text" style="color: #109e42; background-color: #ebf2c2; margin: 20px 0px;padding: 10px 20px; ">';
                      echo $_SESSION['success'];
                      unset($_SESSION['success']);
                    echo '</p></div>';
                  }
                }
              ?>
                <div>
                  <p>New image</p>
                  <input type="file" name="image" style="padding: 10px;">
                </div>
                <div>
                  <p>New name</p>
                  <input type="text" name="name" placeholder="<?= $row['NAME']?>" required/>
                </div>
                <div>
                <p>New category</p>
                  <select name="category">
                    <option value="1">Mens</option>
                    <option value="2">Womens</option>
                    <option value="3">Accessories</option>
                  </select>
                </div>
                <div>
                  <p>New price</p>
                  <input type="number" name="price" placeholder="<?= $row['PRICE']?>" min="0" max="99999" required/>
                </div>
                <div>
                  <textarea name="description" rows="4" cols="50" placeholder="<?= $row['DESCRIPTION']?>"></textarea>
                </div>
              <div class="d-flex ">
                <button>
                  SUBMIT
                </button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6">
          <div class="img-box">
            <img src="images/<?= $row['IMAGE']?>" alt="">
          </div>
        </div>
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