<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- <link rel="stylesheet" href="./styles/styles.css"> -->
  <link rel="stylesheet" href="./styles/style.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E
    <link rel=" preconnect" href="https://fonts.gstatic.com/" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Amita:wght@700&display=swap" rel="stylesheet" />
  <title>About Us</title>
</head>

<body class="about">
  <!-- Navbar -->
  <div class="container-nav">
    <nav class="navbar navbar-expand-lg navbar-light navcolor">
      <div class="container-fluid">
        <a class="navbar-brand" href="./index.php">
          <img src="images\logo(small).png" alt="" width="40" class="d-inline-block align-text-bottom" />
          <div id="logo">
            <div id="fresh">
              <h1>Fresh</h1>
            </div>
            <div id="mart">
              <h1>Mart</h1>
            </div>
          </div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse w-100" id="navbarSupportedContent">
          <form class="navbar-nav justify-content-center d-flex nav-search" action="./search.php" method="GET">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
          </form>
          <ul class="navbar-nav w-100 navbar-links" style="flex-wrap: wrap">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Browse By Category
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="browse-by-category.php?category=Butchers">Butchers</a></li>
                <li><a class="dropdown-item" href="browse-by-category.php?category=Greengrocer">Greengrocer</a></li>
                <li><a class="dropdown-item" href="browse-by-category.php?category=Fishmonger">Fishmonger</a></li>
                <li><a class="dropdown-item" href="browse-by-category.php?category=Bakery">Bakery</a></li>
                <li><a class="dropdown-item" href="browse-by-category.php?category=Delicatessen">Delicatessen</a></li>
              </ul>
            </li>
            <li class="nav-item me-2">
              <a class="nav-link" href="./contact-us.php">Contact</a>
            </li>
            <li class="nav-item me-2">
              <a class="nav-link" href="cart.php">
                <img src="images/bag-heart.svg" alt="" /> Cart</a>
            </li>
            <li class="nav-item me-2">
              <a class="nav-link" href="cart.php">
                Wishlist
              </a>
            </li>
            <li class="nav-item me-2 dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?php
                session_start();

                if (isset($_SESSION['user'])) {
                  echo 'Welcome, ' . $_SESSION['user'] . '!';
                } else echo 'Login/Register';
                ?>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php
                if (isset($_SESSION['user'])) {
                  if ($_SESSION['user_type'] == 'Trader') {
                    echo '<li><a class="dropdown-item" href="./trader/trader_index.php">Trader Settings</a></li>';
                    echo '<li><a class="dropdown-item" href="logout.php">Logout</a></li>';
                  } else {
                    echo '<li><a class="dropdown-item" href="./account-settings/customersettings.php">Account Settings</a></li>';
                    echo '<li><a class="dropdown-item" href="logout.php">Logout</a></li>';
                  }
                } else {
                  echo '<li><a class="dropdown-item" href="login.php">Login</a></li>';
                  echo '<li><a class="dropdown-item" href="register.php">Register</a></li>';
                }
                ?>
                <!-- <li><a class="dropdown-item" href="./account-settings/customersettings.php">Account Settings</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li> -->
                <!-- <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li> -->
              </ul>
            </li>
          </ul>
          </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
  <div></div>

  <div class="heading">Welcome to Fresh Mart</div>
  <div class="container">
    <div class="row">
      <div class="col-lg" id="img">
        <img src="images/grocery.jpg   " alt="Nature" class="w-100" />
      </div>
      <div class="col">
        <p class="lead">
          Cleckhuddersfax is a popular suburb that lumps together a triangle of West Yorkshire - points comprising of Cleckheaton, Huddersfield and Halifax. It has a vibrant local shopping area and is dominated by small independent business. The locals in this city has to drive a short distance to go to supermarket. But Small businesses thrive here. Nowadays, National Chains are looking to set up convenience stores and they have proposed to develop a large store. If that happens then they will hamper the business of local traders here. So the stores have banded together and explored the possibility of offering a joint e-commerce portal to their shops. Hence this, E-commerce platform was created.
        </p>
      </div>
    </div>
  </div>
  <br />
  <br />
  <hr />
  <br />
  <br />
  <div class="container">
    <div class="row row-cols-lg-5 text-center">
      <div class="col">
        <img class="main py-3" src="images/butcher.jpg" alt="" />
        <h6>Butcher</h6>
        <p>
          We specialize in various types of raw meat items. We provide fresh and the best quality meat products in the whole town. We have different cuts of meet like chuck, wings, drumstick, steak and many more.
        </p>
      </div>
      <div class="col">
        <img class="main py-3" src="images/fishmonger.jpg" alt="" />
        <h6>FishMonger</h6>
        <p>
          We sell various types of fresh seasonal fish. We supply fresh fish from river and ocean. We have special fish like the alaskan salmon and tuna.
        </p>
      </div>
      <div class="col">
        <img class="main py-3" src="images/greengrocer.jpg" alt="" />
        <h6>GreenGrocer</h6>
        <p>
          We provide fresh fruits and vegetables directly to our customers from farms. We supply fruits and vegetables grown without any use of chemicals.
        </p>
      </div>
      <div class="col">
        <img class="main py-3" src="images/bakery.jpg" alt="" />
        <h6>Bakery</h6>
        <p>
          We have fresh baked products like croissant, doughnut, sourdough bread, milk bread and many more items. Each of our products are freshly baked every day.
        </p>
      </div>
      <div class="col">
        <img class="main py-3" src="images/deli.jpg" alt="" />
        <h6>Delicatessen</h6>
        <p>
          We provide our customers with our special cured meat items and delicate items.
          We provide products like pepperoni, salami, sausages and many more.

        </p>
      </div>
    </div>
  </div>
  <br />
  <br />

  <hr />
  <br />
  <br />
  <div class="container">
    <div class="row">
      <div class="col-lg" id="img">
        <img src="images/about-us.jpeg" alt="" class="w-100" />
      </div>
      <div class="col py-5">
        <p>
          This website is created by a team of 5 members. Members naming Sajid Miya, Ritesh Rajbhandari,Prashant Shrestha, Ujjwal Datheputhe and Sanil Baniya. We have worked for almost 4 months for the completion of this website. We have been conducting meetings 3 times a week till today. We all have given our best for this website. Each member of our team has given a fruitful amount of time to make this website attractive. We are very happy with this outcome and we hope everybody likes our work.
          <br />
          <br />

        </p>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row py-5">
      <div class="col py-5">
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem rem
          quasi ratione molestias perspiciatis dicta minima maiores, illum
          laborum voluptate eligendi quo corporis exercitationem tenetur
          praesentium doloremque cum esse! Magnam? Lorem ipsum dolor sit amet
          consectetur adipisicing elit. Hic maxime repellat amet fugit iste
          dolore harum voluptatem enim, pariatur quisquam facere distinctio
          soluta mollitia aperiam excepturi numquam nihil reprehenderit rem.
          <br />
          <br />

        </p>
      </div>
      <div class="col-lg" id="img">
        <img src="images/about-us1.jpeg" alt="" class="w-100" />
      </div>
    </div>
  </div>
  <br />
  <br />
  <hr />
  <br />
  <br />
  <div class="container">
    <div class="row-1 lead" id="about">Tech Team</div>
    <div class="row row-cols-lg-5 about-team">
      <div class="col text-center lead">
        <img class="main" src="images/sazid.jpg" alt="" />
        <h6>Sajid Miya</h6>
        <p>
          Front End Developer
        </p>
      </div>
      <div class="col text-center lead">
        <img class="main" src="images/sanjil.jpg" alt="" />
        <h6>Sanjil Baniya</h6>
        <p>
          Developer
        </p>
      </div>

      <div class="col text-center lead">
        <img class="main" src="images/ujwal.jpg" alt="" />
        <h6>Ujwal Datheputhae</h6>
        <p>
          Documentation Manager/Developer
        </p>
      </div>
      <div class="col text-center lead">
        <img class="main " src="images/ritesh.jpg" alt="" />
        <h6>Ritesh Rajbhandari</h6>
        <p>
          Backend Developer
        </p>
      </div>
      <div class="col text-center lead">
        <img class="main" src="images/prashant.jpg" alt="" />
        <h6>Prashant Shrestha</h6>
        <p>
          Documentation Manager/Developer.
        </p>
      </div>
    </div>
  </div>

  <!-- Footer -->

  <div class="footer navcolor">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <img id="footer" src="images\logo.png" alt="" srcset="" />
        </div>
        <div class="col-md-1"></div>
        <div class="col-md my-auto justify-content-center" id="footer">
          <ul id="footer">
            <li><a href="http://">Browse By Category</a></li>
            <li><a href="contact-us.php">Contact</a></li>
            <li><a href="login.php">Login</a></li>
          </ul>
        </div>
        <div class="col-md-1"></div>

        <div class="col-md my-auto" id="footer">
          <a href="about.php">
            <h2>About Us</h2>
          </a>

          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta
            consectetur cum voluptatibus, optio sequi officia? Natus ex soluta
            maxime aliquid.
          </p>
        </div>
      </div>
      <div class="row d-flex justify-content-center">
        <div class="row" id="footer-icons">
          <a href="http://"><img src="images\facebook.svg" alt="" srcset="" /></a>
          <a href="http://"><img src="images\instagram.svg" alt="" srcset="" /></a>
          <a href="http://"><img src="images\paypal.svg" alt="" srcset="" /></a>
          <a href="http://"><img src="images\envelope.svg" alt="" srcset="" /></a>
        </div>
      </div>
    </div>
    <br />
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>