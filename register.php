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
    <!-- end header section -->
  </div>

  <!-- contact section -->

  <section class="contact_section layout" style="padding-top: 40px; padding-bottom: 40px;">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="form_container">
            <div class="heading_container">
              <h2>
                Register
              </h2>
            </div>
            <form action="actions/register_handler.php" method="POST">
            <?

					if(isset($_SESSION['error'])){
						echo  '
              <div>
                <p class="text-danger" style="background-color: #E4C4C4; margin: 20px 0px;padding: 10px 20px; ">';
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            echo'    </p>
              </div>
						';	
					}
				?>
              <div>
                <input type="text" name="name" placeholder="Name " required/>
              </div>
              <div>
                <input type="text" name="phone"placeholder="Phone number" required/>
              </div>
              <div>
                <input type="password" name="pass" placeholder="Password" required/>
              </div>
              <div>
                <input type="password" name="pass2" placeholder="Repeat password" required/>
              </div>
              <div>
                <a href="login.php">Already have an account?</a>
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
            <img src="images/contact-img.jpg" alt="">
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