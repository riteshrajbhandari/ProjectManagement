<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css%22%3E">
    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amita:wght@700&display=swap" rel="stylesheet">

    <!--Custom CSS-->
    <link rel=" stylesheet" href="styles/style.css">
    <title>Your home to fresh products</title>
</head>

<body style="background-color: #eee;">
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
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item me-2">
                            <a class="nav-link" href="cart.php"> <img src="images/bag-heart.svg" alt="">
                                Cart</a>
                        </li>
                        <li class="nav-item me-2 dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php
                                // session_start();

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
                </div>
            </div>
        </nav>
    </div>

    <div class="container shadow py-2 bg-white my-2 rounded " style="box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 1px, rgba(0, 0, 0, 0.07) 0px 2px 2px, rgba(0, 0, 0, 0.07) 0px 4px 4px, rgba(0, 0, 0, 0.07) 0px 8px 8px, rgba(0, 0, 0, 0.07) 0px 16px 16px;">
        <?php
        $pid = $_GET['pid'];

        $stid = oci_parse($connection, "SELECT * FROM product WHERE product_id = '$pid'");
        oci_execute($stid);

        if ($row = oci_fetch_array($stid, OCI_ASSOC)) {
            $product_name = ucwords(strtolower($row['PRODUCT_NAME']));
            $price = $row['UNIT_PRICE'];
            $stock = $row['STOCK'];
            // $shop_id = $row['SHOP_ID'];
            $offer_id = $row['FK1_OFFER_ID'];
            $category_id = $row['FK3_CATEGORY_ID'];
            $availability = $row['AVAILABLE'];
            $short_description = $row['SHORT_DESCRIPTION'];
            $description = $row['PRODUCT_DESCRIPTION'];
            // $report_id = $row['FK4_REPORT_ID'];
            $img_url = $row['IMG_URL'];
            if (isset($row['RATING']))
                $rating = $row['RATING'];
            $shop_id = $row['FK2_SHOP_ID'];
            $stid = oci_parse($connection, "SELECT shop_name FROM shop WHERE shop_id = '$shop_id'");
            oci_execute($stid);
            if ($row = oci_fetch_array($stid, OCI_ASSOC)) {
                $shop_name = $row['SHOP_NAME'];
            }

            if (isset($_GET['pid'])) {
        ?>
                <div class="row product ">
                    <div class="col-lg-6">
                        <div class="w-100 py-3" style="">
                            <img src="<?php echo $img_url; ?>" alt="" srcset="" style="width: 400px; height: 350px;box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 2px, rgba(0, 0, 0, 0.07) 0px 2px 4px, rgba(0, 0, 0, 0.07) 0px 4px 8px, rgba(0, 0, 0, 0.07) 0px 8px 16px, rgba(0, 0, 0, 0.07) 0px 16px 32px, rgba(0, 0, 0, 0.07) 0px 32px 64px;border: radius 0.5em;">
                        </div>

                    </div>
                    <div class="col-lg-6 p-2 mt-2   card">
                        <div class="card-header">
                            <h1>
                                <?php echo $product_name; ?>
                            </h1>
                        </div>

                        <div class="shadow-sm px-3  rounded card-body" style="background-color: #eee;">
                            <div class="py-3">
                                rating: <?php if (isset($rating)) echo $rating; ?>
                                <br>
                            </div>
                            <div class="pb-3">
                                Price: £<?php echo $price; ?>
                            </div>

                            <p>
                                <?php echo $short_description; ?>
                            </p>
                            <p>
                                Sold by: <?php echo $shop_name; ?>
                            </p>
                            <form action="./product.php?pid=<?php echo $pid; ?>" method="post">
                                <div class="quantity pb-3">
                                    Quantity:
                                    <input type="number" value="1" min="1" max="20" class="quantity-field" name="quantity">
                                </div>
                                <?php
                                if ($stock > 0) {
                                    echo '<input class="btn btn-primary" type="submit" value="Add to cart" name="add-to-cart">';
                                    echo '<input class="btn btn-primary" type="submit" value="Add to wishlist" name="add-to-wishlist">';
                                } else {
                                    echo '<input class="btn btn-primary" type="submit" value="Add to cart" name="add-to-cart" disabled>';
                                    echo '<input class="btn btn-primary" type="submit" value="Add to wishlist" name="add-to-wishlist" disabled>';
                                }
                                ?>


                            </form><br>
                        </div>




                        <?php
                        if (isset($_SESSION['user_id'])) {
                            if (isset($_POST['add-to-cart'])) {

                                $quantity = $_POST['quantity'];
                                $user_id = $_SESSION['user_id'];


                                // $stid = oci_parse($connection, "SELECT unit_price FROM product");
                                // oci_execute($stid);
                                // if ($row = oci_fetch_array($stid, OCI_ASSOC)) {
                                //     $unit_price = $row['UNIT_PRICE'];
                                // }
                                $total_price = $price * $quantity;


                                //check if that user_id has a cart. 
                                // if it does, go to cart_product to 
                                // add the prouct there. 
                                // If no cart for current user_id then 
                                // create a cart, and then go to cart_product to add

                                $stid = oci_parse($connection, "SELECT fk2_user_id FROM cart WHERE fk2_user_id = '$user_id'");
                                oci_execute($stid);
                                if (!($row = oci_fetch_array($stid, OCI_ASSOC))) {
                                    //user doesn't have a cart yet//CREATE THE CART
                                    $stid = oci_parse($connection, "INSERT INTO cart (fk2_user_id) VALUES ('$user_id')");
                                    oci_execute($stid);
                                }
                                //they already have a cart, now insert in cart_product

                                $stid = oci_parse($connection, "SELECT fk2_user_id FROM cart, cart_product
                                WHERE cart.cart_id = cart_product.cart_id and cart.fk2_user_id = '$user_id' and cart_product.product_id = '$pid'");
                                oci_execute($stid);

                                if ($row = oci_fetch_array($stid, OCI_ASSOC)) {
                                    echo "You already have this item in your <a href = './cart.php'>Cart</a>";
                                } else {



                                    $stid1 = oci_parse($connection, "SELECT PRODUCT_QUANTITY FROM CART_PRODUCT WHERE CART_ID = (SELECT cart_id FROM cart WHERE fk2_user_id = '$user_id')");
                                    oci_execute($stid1);

                                    $cart_product_empty = true;
                                    $total_no_of_product = 0;
                                    // if ($row = oci_fetch_array($stid, OCI_ASSOC)) {
                                    while (($row = oci_fetch_array($stid1, OCI_ASSOC)) != false) {

                                        $cart_product_empty = false;
                                        $total_no_of_product += $row['PRODUCT_QUANTITY'];

                                        // if ($row['SUM(PRODUCT_QUANTITY)'] >= 20) echo "You already have the max number of items in your cart.";
                                    }
                                    if ($total_no_of_product >= 20) echo "You already have the max number of items in your cart.";

                                    else {                                    //TODO: IS THIS WORKING? 
                                        $stid = oci_parse($connection, "INSERT INTO cart_product (cart_id, product_id, product_quantity, total_price)
                                            VALUES ((SELECT cart_id FROM cart WHERE fk2_user_id = '$user_id'),
                                            '$pid','$quantity','$total_price')");
                                        oci_execute($stid);



                                        $_SESSION['status'] = "Item added";
                                        if (isset($_SESSION['status'])) {
                        ?>
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                <?php echo $_SESSION['status'];
                                                $_SESSION['status'] = null; ?>

                                                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                        <?php
                                            unset($_SESSION['status']);
                                        }

                                        //echo "Item added";
                                    }
                                }
                            }
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            







//wislist instead of cart


                            $stid = oci_parse($connection, "SELECT fk1_user_id FROM wishlist WHERE fk1_user_id = '$user_id'");
                            oci_execute($stid);
                            if (!($row = oci_fetch_array($stid, OCI_ASSOC))) {
                                //user doesn't have a cart yet//CREATE THE CART
                                $stid = oci_parse($connection, "INSERT INTO wishlist (fk1_user_id) VALUES ('$user_id')");
                                oci_execute($stid);
                            }
                            //they already have a cart, now insert in cart_product

                            $stid = oci_parse($connection, "SELECT fk1_user_id FROM wishlist, cart_product
                            WHERE wishlist.cart_id = cart_product.cart_id and wishlist.fk1_user_id = '$user_id' and cart_product.product_id = '$pid'");
                            oci_execute($stid);

                            if ($row = oci_fetch_array($stid, OCI_ASSOC)) {
                                echo "You already have this item in your <a href = './cart.php'>Cart</a>";
                            } else {



                                $stid1 = oci_parse($connection, "SELECT PRODUCT_QUANTITY FROM CART_PRODUCT WHERE CART_ID = (SELECT cart_id FROM cart WHERE fk1_user_id = '$user_id')");
                                oci_execute($stid1);

                                $cart_product_empty = true;
                                $total_no_of_product = 0;
                                // if ($row = oci_fetch_array($stid, OCI_ASSOC)) {
                                while (($row = oci_fetch_array($stid1, OCI_ASSOC)) != false) {

                                    $cart_product_empty = false;
                                    $total_no_of_product += $row['PRODUCT_QUANTITY'];

                                    // if ($row['SUM(PRODUCT_QUANTITY)'] >= 20) echo "You already have the max number of items in your cart.";
                                }
                                if ($total_no_of_product >= 20) echo "You already have the max number of items in your cart.";

                                else {                                    //TODO: IS THIS WORKING? 
                                    $stid = oci_parse($connection, "INSERT INTO cart_product (cart_id, product_id, product_quantity, total_price)
                                        VALUES ((SELECT cart_id FROM cart WHERE fk1_user_id = '$user_id'),
                                        '$pid','$quantity','$total_price')");
                                    oci_execute($stid);

                                    echo "Item added";
                                }
                            }
                        } else echo 'Please <a href="login.php">Login</a> first.'

                        ?>

                    </div>

                </div>

                <!-- <div class="row product empty"></div> -->
                <div class="row product py-3">
                    <div class="col-lg-6">
                        <div class="col-lg-6">
                            <p><?php echo $description; ?>
                            </p>
                        </div>




                        <div class="col-8 add-review py-3 my-5" style="">
                            <form method="POST" action="./product.php?pid=<?php echo $pid; ?>">
                                <div class="grid mt-5 px-3" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px; background-color:#eee;">
                                    <div class="col-lg pt-3">


                                        <fieldset>
                                            <legend>
                                                Create Review
                                            </legend>
                                            <!-- <label for="review-title">Title </label> -->
                                            <div class="pb-3"><input type="text" id="review-title" name="review-title" value="<?php if (isset($_POST['submitReview'])) echo $_POST['review-title'];
                                                                                                                                elseif (isset($_POST['clearReview'])) echo "";
                                                                                                                                ?>" placeholder="Title" /></div>
                                            <div class="pb-3"><textarea rows="4" cols="50" name="review-body" id="review-body" placeholder="Your review"><?php if (isset($_POST['review-body'])) {
                                                                                                                                                                echo $_POST['review-body'];
                                                                                                                                                            } elseif (isset($_POST['clearReview'])) echo "";
                                                                                                                                                            ?></textarea><br /></div>

                                            <div class="pb-3"><label for="rating">Rating: </label>


                                                <input type="number" name="rating" value="<?php /* if (isset($_POST['rating'])) {
                                                                                    echo $_POST['rating'];
                                                                                } elseif (isset($_POST['clearReview'])) echo "1";  */ ?>" min="1" max="5" step="0.5" /><br>
                                            </div>
                                            <span><?php
                                                    $error = false;
                                                    if (isset($_POST['submitReview'])) {
                                                        if (!isset($_SESSION['user'])) {
                                                            $error = true;
                                                            echo 'Please <a href="login.php">login</a> to post your review.<br>';
                                                        } else {
                                                            // $review = $_POST['review-body'];
                                                            if (empty($_POST['review-title'])) {
                                                                echo '<br/>Please enter a title for the review';
                                                                $error = true;
                                                            }
                                                            if (empty($_POST['review-body'])) {
                                                                echo '<br/>Can not submit empty review';
                                                                $error = true;
                                                            }
                                                            if (empty($_POST['rating'])) {
                                                                echo '<br/>Please rate the product for the review<br>';
                                                                $error = true;
                                                            }

                                                            if (isset($_POST['clearReview'])) {
                                                                echo '';
                                                                $error = false;
                                                            }
                                                        }
                                                    } ?></span>
                                            <div class="pb-3"><input type="submit" value="Submit" name="submitReview" />
                                                <input type="submit" value="Clear" name="clearReview" id="clearReview" />
                                            </div>

                                        </fieldset>
                                    </div>
                                </div>
                            </form>
                            <?php
                            if (!$error) {
                                if (isset($_POST['submitReview'])) {
                                    $review_title = $_POST['review-title'];
                                    $review = $_POST['review-body'];
                                    $rating = $_POST['rating'];
                                    $user_id = $_SESSION['user_id'];
                                    $review_date = date("d-M-y");
                                    // echo $review_date;
                                    if (!$error) {
                                        $stid = oci_parse($connection, "INSERT INTO review (review_title, review_text, rating, FK1_PRODUCT_ID, FK2_USER_ID, review_date)
                VALUES ('$review_title', '$review', '$rating', '$pid', '$user_id', '$review_date')");
                                        oci_execute($stid);

                                        $avgrating = 0;
                                        $stid = oci_parse($connection, "SELECT AVG(rating) FROM review");
                                        oci_execute($stid);
                                        if ($row = oci_fetch_array($stid, OCI_ASSOC)) {
                                            $avgrating = $row['AVG(RATING)'];
                                            $stid = oci_parse($connection, "UPDATE product SET rating = '$avgrating' WHERE product_id = '$pid'");
                                            oci_execute($stid);
                                        }



                                        // header("Location: ./product.php?pid=" . $pid);
                                    }
                                }
                            }


                            ?>
                            <?php /*
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
                            echo $confirm; */
                            ?>
                        </div>






                    </div>
                    <div class="col-lg-6 reviews">

                        <div class="border p-2 my-3 " style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                            <div class="py-2 ">
                                <?php

                                $stid = oci_parse(
                                    $connection,
                                    "SELECT R.*, U.FIRST_NAME, U.LAST_NAME, U.PROFILE_PIC_URL, user_id FROM review R, users U WHERE R.FK2_USER_ID = U.USER_ID AND R.FK1_PRODUCT_ID='$pid'"
                                );
                                oci_execute($stid);


                                $number_of_reviews = 0;
                                while (($row = oci_fetch_array($stid, OCI_ASSOC)) != false and $number_of_reviews < 5) {

                                    $fullname = $row['FIRST_NAME'] . " " . $row['LAST_NAME'];
                                    $dateWritten = $row['REVIEW_DATE'];
                                    $rating = $row['RATING'];
                                    $review_title = $row['REVIEW_TITLE'];
                                    $review = $row['REVIEW_TEXT'];
                                    $profile_pic_url = $row['PROFILE_PIC_URL'];
                                    $user_id = $row['USER_ID'];
                                    $review_id = $row['REVIEW_ID'];


                                    echo '<img src="' . $profile_pic_url . '" alt="profile_pic" class="review-profile-pic">';
                                    echo $fullname . "<br>" . "<hr>";
                                ?>
                            </div>
                            <!-- TODO: ADD DELETE & EDIT BUTTON BESIDE COMMENT WHEN THE CORRECT USER IS LOGGED IN -->

                            <!-- <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div> -->

                            <?php
                                    // sererate decimal part rom whole number
                                    // start
                                    echo "Rating: " . $rating . " " . "<br>";
                                    echo "Date: " . $dateWritten . " ";
                            ?>

                        <?php
                                    if (isset($_POST['delete'])) {
                                        $stidd = oci_parse($connection, "DELETE FROM review WHERE review_id = '$review_id'");
                                        oci_execute($stidd);
                                        $_POST['delete'] = null;
                                    }

                                    echo '<div class="review-title">' . $review_title . "</div>";
                                    echo $review . "<br><br>";
                                }








                                // if ($row = oci_fetch_array($stid, OCI_ASSOC)) {


                                //     $fullname = "full name ";
                                //     $dateWritten = " dd/mm/yyyy ";
                                //     $noOfStars = 4;
                                //     $review = "<br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi ea adipisci ducimus! Ullam, placeat. Voluptatum aperiam ab possimus ducimus a!";
                                //     for ($i = 0; $i < 3; $i++) {
                                //         echo $fullname;
                                //         echo $dateWritten;

                                //         for ($j = 0; $j < $noOfStars; $j++)
                                //             echo " Star";
                                //         echo $review . "<br><br>";
                                //     }
                                //     // $$_SESSION['user'] = $row['FIRST_NAME'];
                                // $_SESSION['user_id'] = $row['USER_ID'];
                                // header("Location: main.php");
                                // foreach ($row as $item) {
                                //     echo $row[0];
                                //     TODO: how to get just the first_name
                                //     $_SESSION['user']=$item;
                                //     header("Location: index.php");
                                //     echo ($item !== null ? htmlentities($item, ENT_QUO  TES) : "&nbsp;");
                                // }
                                // }


                        ?>
                        <form action="./product.php?pid=<?php echo $pid; ?>" method="post">
                            <input type="submit" value="delete_review" name="delete">
                        </form>
                        </div>
                    </div>
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
                    <li><a href="browse-by-category.php">Browse By Category</a></li>
                    <li><a href="contact-us.php">Contact</a></li>
                    <li><a href="login.php">Login</a></li>
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
<script src="./scripts/javascript.js"></script>
</body>

</html>