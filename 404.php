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
        include('parts/header.php');
      ?>
      <!-- end header section -->
    </div>

    <!-- shop section1 -->
    <section class="shop_section layout_padding" style="min-height: 60vh;">
      <div class="container">
        <div class="heading_container heading_center">
          <h2>
            404 error
          </h2>
          <p>Page not found</p>
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