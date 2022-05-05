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
                    <form class="navbar-nav justify-content-center d-flex nav-search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    </form>
                    <ul class="navbar-nav w-100 navbar-links" style="flex-wrap:wrap">
                        <li class="nav-item me-2">
                            <a class="nav-link" aria-current="" href="#">Browse by Category</a>
                        </li>
                        <li class="nav-item me-2">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item me-2">
                            <a class="nav-link" href="#"> <img src="images/bag-heart.svg" alt="">
                                Cart</a>
                        </li>
                        <li class="nav-item me-2 dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Welcome, USER!
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="./account-settings/customersettings.php">Account Settings</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="container">




        <!-- $result = "";
if (isset($_POST['submitSearch']) && $_POST['category'] != 'Select your category') {
    $query = "SELECT * FROM search_products WHERE Category = '" . $_POST['category'] . "' and Name LIKE '%" . $_POST['searchtxt'] . "%';";
$result = mysqli_query($connection, $query);
} -->




        <div class="row">
            <div class="col-lg-6"><img src="./images/amazon-pantry-offer-660_071118044704.webp" alt="" srcset="" style="width: 400px;"></div>
            <div class="col-lg-6">
                <h1><?php
                    $result = "";
                    if (isset($_GET['pid']))
                        echo $_GET['pid'];
                    else echo 0000;
                    ?>
                    Product Title</h1><br>
                rating
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Et quasi repudiandae ratione iure molestiae. Quaerat animi maiores doloribus nam voluptate?
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Necessitatibus voluptatum laboriosam, eos consectetur aliquam officiis voluptate repudiandae quaerat, sapiente voluptatibus assumenda nulla sunt deserunt illo veniam quo, recusandae enim! Obcaecati dolorem libero deserunt aspernatur architecto itaque perferendis, repellat sint cum molestiae magni et reiciendis placeat nihil! Obcaecati neque minima praesentium?</p>
            </div>
            <div class="col-lg-6">
                <?php
                $fullname = "full name ";
                $dateWritten = " dd/mm/yyyy ";
                $noOfStars = 4;
                $review = "<br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi ea adipisci ducimus! Ullam, placeat. Voluptatum aperiam ab possimus ducimus a!";
                for ($i = 0; $i < 3; $i++) {
                    echo $fullname;
                    echo $dateWritten;

                    for ($j = 0; $j < $noOfStars; $j++)
                        echo " Star";
                    echo $review . "<br><br>";
                }
                ?>
            </div>
        </div>
    </div>
    <div class="footer navcolor">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <a href="./index.php">
                        <img id="footer" src="images\logo.png" alt="" srcset="">
                    </a>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md my-auto justify-content-center" id="footer">
                    <ul id="footer">
                        <li><a href="http://">Browse By Category</a></li>
                        <li><a href="http://">Contact</a></li>
                        <li><a href="http://">Login</a></li>
                    </ul>
                </div>
                <div class="col-md-1"></div>

                <div class="col-md my-auto" id="footer">
                    <h2>About Us</h2>
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