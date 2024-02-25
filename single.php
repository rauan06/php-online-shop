<?
  header('Cache-Control: no cache'); //no cache
  session_cache_limiter('private_no_expire'); // works
  session_start();

    if(isset($_POST["single"]))
    {
        $product = array(
            'id'			=>	$_POST['id'],
            'name'			=>	$_POST['name'],
            'price'		    =>	$_POST['price'],
            'image'		    =>	$_POST['image'],
            'description'   =>  $_POST['description'],
        );

        $_SESSION['single'] = $product;
    }
    else{
        if(isset($_SESSION['single']))
        {

        } else{
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
    <?
      include 'parts/header.php';
    ?>
    <!-- end header section -->
  </div>

  <!-- contact section -->

  <section class="contact_section layout" style="padding-top: 40px; padding-bottom: 40px;">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="img-box">
            <img src="images/<?= $_SESSION['single']['image'];?>" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form_container">
            <div class="heading_container">
      <?

				if(isset($_SESSION['error']))
                {
					echo  '<div><p class="text-danger" style="background-color: #E4C4C4; margin: 20px 0px;padding: 10px 20px; ">';
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    echo'</p></div>';	
				} else{ 
                    if(isset($_SESSION['success'])){
                      echo '<div><p class="text" style="color: #109e42; background-color: #ebf2c2; margin: 20px 0px;padding: 10px 20px; ">';
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                      echo '</p></div>';
                    }
                  }

			?>
                <h2>
                    <?= $_SESSION['single']['name'];?>
                </h2>
                <h4>
                    $ <?= $_SESSION['single']['price'];?>
                </h4>
                <p>
                    <?= $_SESSION['single']['description'];?>
                </p>
            </div>
            <form action="actions/add_cart.php" method="POST">
                <div>
                <p>Quantity: <input type="number" name="quantity" value="1" style="width: 60px;" min="1" max="50"></input></p>
                <input type="hidden" name="id" value="<?= $_SESSION['single']['id']?>"></input>
                <input type="hidden" name="name" value="<?= $_SESSION['single']['name']?>"></input>
                <input type="hidden" name="price" value="<?= $_SESSION['single']['price']?>"></input>
                <input type="hidden" name="image" value="<?= $_SESSION['single']['image']?>"></input>
                <input type="hidden" name="description" value="<?= $_SESSION['single']['description']?>"></input>
                </div>
                <div class="d-flex ">
                    <button type="submit" name="add">
                        Add to cart
                    </button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end contact section -->

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