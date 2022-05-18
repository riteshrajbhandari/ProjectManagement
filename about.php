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
          <form class="navbar-nav justify-content-center d-flex nav-search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
          </form>
          <ul class="navbar-nav w-100 navbar-links" style="flex-wrap: wrap">
            <li class="nav-item me-2">
              <a class="nav-link" aria-current="" href="#">Browse by Category</a>
            </li>
            <li class="nav-item me-2">
              <a class="nav-link" href="./contact-us.php">Contact</a>
            </li>
            <li class="nav-item me-2">
              <a class="nav-link" href="cart.php">
                <img src="images/bag-heart.svg" alt="" /> Cart</a>
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

  <div class="heading">About Cleckhuddersfax</div>
  <div class="container">
    <div class="row">
      <div class="col-lg" id="img">
        <img src="images/grocery.jpg" alt="Nature" class="w-100" />
      </div>
      <div class="col">
        <p class="lead">
          A popular suburb of Cleckhuddersfax is distinguished by the fact
          that it continues to have a vibrant local shopping area that is
          dominated by small independent businesses. Being part of a larger
          city there are ample opportunities for locals to drive a short
          distance to find a large supermarket - yet the small shops continue
          to thrive. However, national chains have started to find space in
          the area by setting up convenience stores and now there is a
          proposal to develop a larger store. The traders are aware that they
          cannot compete on opening hours without losing out on family life,
          and that there are more locals that would shop with them if they
          weren’t working most of the time when the shops were open. The
          stores selling fresh goods have decided to band together and explore
          the possibility of offering a joint e-commerce portal to their
          shops. They have recruited someone to explore issues of food safety,
          collection etc. and they think they may have a proposal that will
          work. They now want to fund the development of a prototype
          e-commerce platform.
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
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi
          consequatur eum, ad nisi ipsa asperiores assumenda, minima officiis
          voluptates explicabo corrupti, alias porro ducimus! Nesciunt
          voluptatibus explicabo ut rerum eius.
        </p>
      </div>
      <div class="col">
        <img class="main py-3" src="images/fishmonger.jpg" alt="" />
        <h6>FishMonger</h6>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi
          consequatur eum, ad nisi ipsa asperiores assumenda, minima officiis
          voluptates explicabo corrupti, alias porro ducimus! Nesciunt
          voluptatibus explicabo ut rerum eius.
        </p>
      </div>
      <div class="col">
        <img class="main py-3" src="images/greengrocer.jpg" alt="" />
        <h6>GreenGrocer</h6>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi
          consequatur eum, ad nisi ipsa asperiores assumenda, minima officiis
          voluptates explicabo corrupti, alias porro ducimus! Nesciunt
          voluptatibus explicabo ut rerum eius.
        </p>
      </div>
      <div class="col">
        <img class="main py-3" src="images/bakery.jpg" alt="" />
        <h6>Bakery</h6>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi
          consequatur eum, ad nisi ipsa asperiores assumenda, minima officiis
          voluptates explicabo corrupti, alias porro ducimus! Nesciunt
          voluptatibus explicabo ut rerum eius.
        </p>
      </div>
      <div class="col">
        <img class="main py-3" src="images/deli.jpg" alt="" />
        <h6>Delicatessen</h6>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi
          consequatur eum, ad nisi ipsa asperiores assumenda, minima officiis
          voluptates explicabo corrupti, alias porro ducimus! Nesciunt
          voluptatibus explicabo ut rerum eius.
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
        <img src="images/grocery.jpg" alt="" class="w-100" />
      </div>
      <div class="col">
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
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Similique
          fugiat reprehenderit odio consequatur voluptatibus consectetur,
          exercitationem quam iure doloremque voluptate ratione sapiente,
          perspiciatis numquam corporis aspernatur rem! Recusandae, molestias
          harum? <br />
          <br />
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus,
          iure deserunt ipsam, dolorum aperiam veniam nam odio cum possimus
          ullam reiciendis quidem harum doloremque. Aut, officia sunt?
          Voluptates, architecto soluta? Lorem ipsum dolor, sit amet
          consectetur adipisicing elit. Sunt magnam enim rerum harum?
        </p>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col">
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
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Similique
          fugiat reprehenderit odio consequatur voluptatibus consectetur,
          exercitationem quam iure doloremque voluptate ratione sapiente,
          perspiciatis numquam corporis aspernatur rem! Recusandae, molestias
          harum? <br />
          <br />
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus,
          iure deserunt ipsam, dolorum aperiam veniam nam odio cum possimus
          ullam reiciendis quidem harum doloremque. Aut, officia sunt?
          Voluptates, architecto soluta? Lorem ipsum dolor, sit amet
          consectetur adipisicing elit. Sunt magnam enim rerum harum?
        </p>
      </div>
      <div class="col-lg" id="img">
        <img src="images/grocery.jpg" alt="" class="w-100" />
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
      <div class="col">
        <img class="main" src="images/sazid.jpg" alt="" />
        <h6>Sajid Miya</h6>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi
          consequatur eum, ad nisi ipsa asperiores assumenda, minima officiis
          voluptates explicabo corrupti, alias porro ducimus! Nesciunt
          voluptatibus explicabo ut rerum eius.
        </p>
      </div>
      <div class="col">
        <img class="main" src="images/sanjil.jpg" alt="" />
        <h6>Sanjil Baniya</h6>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi
          consequatur eum, ad nisi ipsa asperiores assumenda, minima officiis
          voluptates explicabo corrupti, alias porro ducimus! Nesciunt
          voluptatibus explicabo ut rerum eius.
        </p>
      </div>
      <div class="col">
        <img class="main" src="images/ujwal.jpg" alt="" />
        <h6>Ujwal Datheputhae</h6>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi
          consequatur eum, ad nisi ipsa asperiores assumenda, minima officiis
          voluptates explicabo corrupti, alias porro ducimus! Nesciunt
          voluptatibus explicabo ut rerum eius.
        </p>
      </div>
      <div class="col">
        <img class="main" src="images/ritesh.jpg" alt="" />
        <h6>Ritesh Rajbhandari</h6>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi
          consequatur eum, ad nisi ipsa asperiores assumenda, minima officiis
          voluptates explicabo corrupti, alias porro ducimus! Nesciunt
          voluptatibus explicabo ut rerum eius.
        </p>
      </div>
      <div class="col">
        <img class="main" src="images/prashant.jpg" alt="" />
        <h6>Prashant Shrestha</h6>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi
          consequatur eum, ad nisi ipsa asperiores assumenda, minima officiis
          voluptates explicabo corrupti, alias porro ducimus! Nesciunt
          voluptatibus explicabo ut rerum eius.
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