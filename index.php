<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amita:wght@700&display=swap" rel="stylesheet">
    <!--Custom CSS-->
    <link rel="stylesheet" href="styles/style.css">
    <title>Your home to fresh products</title>
</head>

<body>
    <!-- NAVBAR -->
    <div class="container-nav flex-row">
        <nav class="navbar navbar-expand-md navbar-light navcolor">
            <div class="container-fluid">
                <a class="navbar-brand" href="./index.php">
                    <img src="images\logo(small).png" alt="" width="40" class="d-inline-block align-text-bottom">
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
                    <ul class="navbar-nav w-100 navbar-links" style="flex-wrap:wrap">
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
                            <a class="nav-link" href="cart.php"> <img src="images/bag-heart.svg" alt="">
                                Cart</a>
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
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <!-- CAROUSEL -->

    <div class="container">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images\indeterminate-tomato-variety-1403423-01-bf3ec05de4754840abbd8dc26514bee77.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images\Untitled.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images\Untitled.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </div>

    <br><br>
    <div class="container title">
        Offers
    </div>

    <!-- OFFERS SLIDER -->
    <div class="container-slider">
        <div class="row slider">
            <div class="col"></div>
            <div class="col-lg-10 scrolling-wrapper row flex-row flex-nowrap">

                <div class="col-4 fixed-width-card">
                    <div class="card card-block card-1"><img src="images\image.jfif" alt="" srcset="" class="offers-img"></div>
                    <div>Lorem ipsum dolor sit amet. <br> $00.00</div>
                </div>
                <div class="col-4 fixed-width-card">
                    <div class="card card-block card-2"><img src="images\ed04b09381eec3f9.webp" alt="" srcset="" class="offers-img"></div>
                    <div>Lorem ipsum dolor sit amet. <br> $00.00</div>
                </div>
                <div class="col-4 fixed-width-card">
                    <div class="card card-block card-3"><img src="images\groceries-offers.jpg" alt="" srcset="" class="offers-img"></div>
                    <div>Lorem ipsum dolor sit amet. <br> $00.00</div>
                </div>
                <div class="col-4 fixed-width-card">
                    <div class="card card-block card-4"><img src="images\Untitled.png" alt="" srcset="" class="offers-img"></div>
                    <div>Lorem ipsum dolor sit amet. <br> $00.00</div>
                </div>
                <div class="col-4 fixed-width-card">
                    <div class="card card-block card-5"><img src="images\Untitled.png" alt="" srcset="" class="offers-img"></div>
                    <div>Lorem ipsum dolor sit amet. <br> $00.00</div>
                </div>
                <div class="col-4 fixed-width-card">
                    <div class="card card-block card-6"><img src="images\Untitled.png" alt="" srcset="" class="offers-img"></div>
                    <div>Lorem ipsum dolor sit amet. <br> $00.00</div>
                </div>
                <div class="col-4 fixed-width-card">
                    <div class="card card-block card-7"><img src="images\Untitled.png" alt="" srcset="" class="offers-img"></div>
                    <div>Lorem ipsum dolor sit amet. <br> $00.00</div>
                </div>
                <div class="col-4 fixed-width-card">
                    <div class="card card-block card-8"><img src="images\Untitled.png" alt="" srcset="" class="offers-img"></div>
                    <div>Lorem ipsum dolor sit amet. <br> $00.00</div>
                </div>
                <div class="col-4 fixed-width-card">
                    <div class="card card-block card-9"><img src="images\Untitled.png" alt="" srcset="" class="offers-img"></div>
                    <div>Lorem ipsum dolor sit amet. <br> $00.00</div>
                </div>
                <div class="col-4 fixed-width-card">
                    <div class="card card-block card-10"><img src="images\Untitled.png" alt="" srcset="" class="offers-img"></div>
                    <div>Lorem ipsum dolor sit amet. <br> $00.00</div>
                </div>
            </div>
            <div class="col"></div>

        </div>
    </div>
    <br><br>
    <div class="container title">
        Shops
    </div><br>

    <!-- SHOPS -->
    <div class="container">
        <div class="row row-cols-2 row-cols-lg-5 g-4">
            <div class="col">
                <div class="card shop">
                    <img src="images\butchers-knife-17307-1.jpg" class="card-img-top" alt="...">
                    <div class="card-body" id="shops">
                        <p class="card-text">Butchers</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shop">
                    <img src="images\106926409_3180377422020755_2425918696468094178_n.jpg" class="card-img-top" alt="...">
                    <div class="card-body" id="shops">
                        <p class="card-text">Greencrocer</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shop">
                    <img src="images\fishmongers_256623856_1000.jpg" class="card-img-top" alt="...">
                    <div class="card-body" id="shops">
                        <p class="card-text">Fishmonger</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shop">
                    <img src="images\Screenshot 2022-04-09 184212.png" class="card-img-top" alt="...">
                    <div class="card-body" id="shops">
                        <p class="card-text">Bakery</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shop">
                    <img src="images\Delicatessen-1024x688.jpg" class="card-img-top" alt="...">
                    <div class="card-body" id="shops">
                        <p class="card-text">Delicatessen</p>
                    </div>
                </div>
            </div>
        </div>
    </div><br>
    <div class="container title">
        Essentials
    </div><br>

    <!-- ESSENTIALS GRID -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 p-3"><a href="./product.php?pid=1">
                    <div class="card essentials essentials-large gap-3"><img src="images\106926409_3180377422020755_2425918696468094178_n.jpg" alt="" srcset="">
                        <div class="card-text p-3">
                            <h2>Hello</h2>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg>
                            <br>
                            <h2>$00.00</h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 p-3">
                <div class="row mb-3">
                    <div class="col-6">
                        <div class="card essentials"><img src="images\fishmongers_256623856_1000.jpg" alt="" srcset="">
                            <div class="card-text p-2">Hello<br>$00.00</div>
                        </div>

                    </div>
                    <div class="col-6">
                        <div class="card essentials"><img src="images\Screenshot 2022-04-09 184212.png" alt="" srcset="">
                            <div class="card-text p-2">Hello<br>$00.00</div>
                        </div>

                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <div class="card essentials"><img src="images\Delicatessen-1024x688.jpg" alt="" srcset="">
                            <div class="card-text p-2">Hello<br>$00.00</div>
                        </div>

                    </div>
                    <div class="col-6">
                        <div class="card essentials"><img src="images\106926409_3180377422020755_2425918696468094178_n.jpg" alt="" srcset="">
                            <div class="card-text p-2">Hello<br>$00.00</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer navcolor">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <a href="#top">
                        <img id="footer" src="images\logo.png" alt="" srcset="">
                    </a>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md my-auto justify-content-center" id="footer">
                    <ul id="footer">
                        <li><a href="browse-by-category.php">Browse By Category</a></li>
                        <li><a href="contact-us.php">Contact</a></li>
                        <li><a href="login.php">Login</a></li>
                    </ul>
                </div>
                <div class="col-md-1"></div>

                <div class="col-md my-auto" id="footer">
                    <a href="./about.php">
                        <h2>About Us</h2>
                    </a>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta consectetur cum voluptatibus, optio sequi officia? Natus ex soluta maxime aliquid.</p>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="row" id="footer-icons">
                    <a href="http://"><img src="images\facebook.svg" alt="" srcset=""></a>
                    <a href="http://"><img src="images\instagram.svg" alt="" srcset=""></a>
                    <a href="http://"><img src="images\paypal.svg" alt="" srcset=""></a>
                    <a href="http://"><img src="images\envelope.svg" alt="" srcset=""></a>
                </div>
            </div>
        </div>
        <br>
    </div>

    <!--Bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!--Custom JS-->
    <script src="scripts/javascript.js"></script>
</body>

</html>