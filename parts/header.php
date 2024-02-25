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
                <a class="nav-link" href="index.php">home </a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="shop.php?category=Mens"> mens </a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="shop.php?category=Womens">womens</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="shop.php?category=Accessories"> accessories</a>
              </li>
              <li class="nav-item active">
                <?
                if(isset($_SESSION['role'])){
                if($_SESSION['role'] == 'admin')
                {
                  echo' 
                    <li class="nav-item active">
                      <a class="nav-link" href="admin.php"> admin</a>
                    </li>
                  ';
                }}
                ?>
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