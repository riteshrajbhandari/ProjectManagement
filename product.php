<?php
include('connection.php');
?>
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
        <?php
        $pid = $_GET['pid'];

        $stid = oci_parse($connection, "SELECT * FROM product WHERE product_id = '$pid'");
        oci_execute($stid);

        if ($row = oci_fetch_array($stid, OCI_ASSOC)) {
            $product_name = $row['PRODUCT_NAME'];
            $price = $row['UNIT_PRICE'];
            $stock = $row['STOCK'];
            $shop_id = $row['SHOP_ID'];
            // $offer_id = $row['OFFER_ID'];
            $cateogory_id = $row['CATEGORY_ID'];
            $availability = $row['AVAILABLE'];
            $short_description = $row['SHORT_DESCRIPTION'];
            $description = $row['PRODUCT_DESCRIPTION'];
            $report_id = $row['REPORT_ID'];
            $img_url = $row['IMG_URL'];
            $rating = $row['RATING'];
            $shop_id = $row['SHOP_ID'];
            $category_id = $row['CATEGORY_ID'];

            if (isset($_GET['pid'])) {
        ?>
                <div class="row product">
                    <div class="col-lg-6"><img src="<?php echo $img_url; ?>" alt="" srcset="" style="width: 400px;"></div>
                    <div class="col-lg-6">
                        <h1><?php
                            echo $product_name;
                            ?>
                        </h1><br>
                        rating:
                        <?php echo $rating; ?>
                        <br>
                        Price: <?php echo $price; ?>
                        <p>
                            <?php echo $short_description; ?>
                        </p>
                    </div>
                </div>
                <!-- <div class="row product empty"></div> -->
                <div class="row product">
                    <div class="col-lg-6">
                        <p><?php echo $description; ?>
                        </p>
                    </div>
                    <div class="col-lg-6 reviews">
                        <hr>
                        <div class="add-review">
                            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                <fieldset>
                                    <label for="rating">Rating: </label>

                                    <input type="text" name="emailTxt" value="<?php if (isset($_POST['rating'])) {
                                                                                    echo $_POST['emailTxt'];
                                                                                } else echo ''; ?>" /><br />
                                    <legend>Comments</legend>
                                    <label for="email">Email: </label>
                                    <input type="text" name="emailTxt" value="<?php if (isset($_POST['emailTxt'])) {
                                                                                    echo $_POST['emailTxt'];
                                                                                } else echo ''; ?>" /><br />
                                    <textarea rows="4" cols="50" name="commentTxt"><?php if (isset($_POST['commentTxt'])) {
                                                                                        echo $_POST['commentTxt'];
                                                                                    } else echo ''; ?></textarea><br />
                                    <label for="confirm">Click to Confirm: </label>
                                    <input type="checkbox" name="checkBox" value="agree"><br />
                                    <input type="submit" value="Submit" name="sendComment" />
                                    <input type="reset" value="Clear" />
                                </fieldset>
                            </form>
                            <?php
                            $confirm = 'Not Agreed<br />';
                            if (isset($_POST['checkBox'])) {
                                if (isset($_POST['sendComment'])) {
                                    if (!empty($_POST['emailTxt'])) {
                                        if (filter_var($_POST['emailTxt'], FILTER_VALIDATE_EMAIL)) {
                                            if (!empty($_POST['commentTxt'])) {
                                                $sendEmail = $_POST['emailTxt'];
                                                $sendComment = $_POST['commentTxt'];
                                                echo '<br/>' . $sendEmail;
                                                echo '<br/>' . $sendComment;
                                                $confirm = 'Agreed<br />';
                                            } else {
                                                echo 'comment must not be empty<br />';
                                            }
                                        } else {
                                            echo 'email not valid<br />';
                                        }
                                    } else {
                                        echo 'email must not be empty<br />';
                                    }
                                }
                            }

                            echo $confirm;
                            ?>
                        </div>
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
        <?php
            }
        } else echo 'product does not exist';

        // while (($row = oci_fetch_array($stid, OCI_ASSOC)) != false) {
        //     echo $row['ID'] . "<br>\n";
        //     echo $row['DESCRIPTION']->read(11) . "<br>\n"; // this will output first 11 bytes from DESCRIPTION
        // }

        ?>



        <?php

        ?>


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