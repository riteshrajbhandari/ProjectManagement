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
                            <a class="nav-link" href="contact-us.php">Contact</a>
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

    <?php

    // $cookie_name = 'cart';


    // if (!isset($_COOKIE[$cookie_name])) {
    //     echo "Cookie named '" . $cookie_name . "' is not set!";
    // } else {
    //     echo "Cookie '" . $cookie_name . "' is set!<br>";
    //     echo "Value is: " . $_COOKIE[$cookie_name];
    // }





    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];

        $stid = oci_parse($connection, "SELECT * FROM cart, cart_product, product WHERE  cart.FK2_USER_ID = '$user_id' and 
            cart.cart_id = cart_product.cart_id and 
        cart.cart_id = cart_product.cart_id and 
            cart.cart_id = cart_product.cart_id and 
            product.product_id = cart_product.product_id");
        oci_execute($stid);
        $error = true;
        $total = 0.0;
    ?>
        <div class="container">
            <div class="row product">
                <div class="col-lg-6">
                    <!-- <table>
                        <tr>
                            <td>Item</td>
                            <td>Price</td>
                            <td>Quantity</td>
                            <td>Subtotal</td>
                        </tr> -->

                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <td>Item</td>
                                <td>Price</td>
                                <td>Quantity</td>
                                <td>Subtotal</td>
                            </tr>
                        </thead>

                        <?php
                        while (($row = oci_fetch_array($stid, OCI_ASSOC)) != false) {
                            $error = false;
                            $cart_id = $row['CART_ID'];
                            $product_img_url = $row['IMG_URL'];
                            $product_name = $row['PRODUCT_NAME'];
                            $product_desc = $row['SHORT_DESCRIPTION'];
                            $unit_price = $row['UNIT_PRICE'];
                            $quantity = $row['PRODUCT_QUANTITY'];
                            $sub_total = $row['TOTAL_PRICE'];
                            $total += $sub_total;

                            $product_id = $row['PRODUCT_ID']; ?>
                            <tr>
                                <td><img class="img-cart" src="<?php echo $product_img_url; ?>" alt="" srcset="">
                                    <?php
                                    echo $product_name . '<br>';
                                    echo $product_desc; ?>
                                </td>
                                <td>
                                    <?php echo $unit_price; ?>
                                </td>
                                <td>
                                    <?php echo $quantity; ?>
                                </td>
                                <td>
                                    <?php echo $sub_total; ?>
                                </td>
                                <td>
                                    <form action="./removefromcart.php" method="post">
                                        <input type="number" name="producttoremove" id="producttoremove" hidden value="<?php echo $product_id; ?>">
                                        <input type="number" name="user_id" id="user_id" hidden value="<?php echo $user_id; ?>">
                                        <input type="submit" value="Delete">
                                    </form>
                                </td>
                            </tr><?php
                                    // echo '<a href="delete.php?pid=">Remove</a>'
                                } ?>
                    </table>


                </div>
                <div class="col-lg-6">
                    <div class="mb-3 p-3 text-center text-danger lead" style="border: 2px solid black; border-radius:2em; background-color:#eee;">
                        <?php
                        if (!$error) {
                            echo 'Total: £' . $total; ?>
                            <hr>

                            <div class="grid">
                                <form action="./cart.php" method="post">
                                    <div class="col-12-lg p-5">
                                        <?php
                                        // TODO:: check if today is wednesday, thursday or friday
                                        // if it is, add today and the days after today until friday.
                                        // if not, while today doesn't reach wednesday, keep incrementing day and
                                        // when it does reach wednesday, add today and the days after today until friday
                                        $days_of_collection = array('Wed', 'Thu', 'Fri');
                                        $days = array('Sat', 'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri');
                                        $today = date("D");
                                        $chosen_day = $days[0];
                                        $counter = 0;

                                        $key = array_search($today, $days); //get the index of the day today with respect to the days array
                                        // $todays_date = date("d-M-y");
                                        //TODO
                                        $todays_date = date("d-M-y", strtotime("-3 days", strtotime(date("Y-m-d"))));

                                        while (!in_array($today, $days_of_collection)) { //while a given day is not within collection slot days,
                                            $key++;                                     //time travel to the next day
                                            $today = $days[$key];                       //check if that day is in the list
                                            // echo $key;
                                        } //because of this, the $key is the            //the moment it finds it in the list, exit the while loop
                                        //difference betn the next collection
                                        //day and today in number of days, inclusive
                                        ?>
                                        <select name="collection_slot" id="collection_slot" default="Collection Slot">
                                            <option value="">Choose a collection slot</option>
                                            <?php
                                            for ($i = $key; $i < 7; $i++) {   //loops from that day onward till friday to view available collection days
                                                $counter++;
                                                //get todays date, add $key no of days to it and display it from there
                                                $next_available_date = date('d-M-y', strtotime($todays_date . ' + ' . $i . ' days'));
                                                // Add days to date and display it
                                                echo '<option value="' . $days[$i] . ' ' . $next_available_date . '">' . $days[$i] . ' ' . $next_available_date . '</option>';
                                            }
                                            if ($counter < 2) { //if there is only friday left,
                                                for ($j = 4; $j < 6; $j++) { //show also the next week's wednesday & thursday
                                                    $new_next_available_date = date('d-M-y', strtotime($next_available_date . ' + ' . ($j + 1) . ' days'));
                                                    echo '<option value="' . $days[$j] . ' ' . $new_next_available_date . '">' . $days[$j] . ' ' . $new_next_available_date . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-12 pb-5">
                                        <select name="collection_time" id="collection_time">
                                            <option value="10:00 - 13:00">10:00 - 13:00</option>
                                            <option value="13:00 - 16:00">13:00 - 16:00</option>
                                            <option value="16:00 - 19:00">16:00 - 19:00</option>
                                        </select>
                                    </div>

                                    <!-- Checkout Button -->
                                    <div id="paypal-payment-button" class="col-lg-12 pb-5 cart-submit">
                                        <!-- <input type="submit"  value="Checkout" name="checkout"> -->


                                    </div>


                                </form>
                            </div>

                        <?php
                        } else echo "You don't have anything in your cart yet."; ?>
                        <!-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam natus fugiat vel numquam impedit nihil fuga, dolorem veniam at asperiores? -->
                    </div>

                </div>
            </div><?php
                } else echo '<a href="login.php">Login</a> to display your cart' ?>


        <?php
        if (isset($_POST['checkout'])) {
            include('payment.php');
            $collection_slot = $_POST['collection_slot'];
            $collection_time = $_POST['collection_time'];
            $order_date = date("d-M-y");
            // print_r($collection_slot);
            // print_r($order_date);

            // $stid = oci_parse($connection, "INSERT INTO orders (
            // GROSS_PRICE,
            // ORDER_DATE,
            // CART_ID,
            // FK3_USER_ID)
            // VALUES ('$total','$order_date', '$cart_id','$user_id')");
            // oci_execute($stid);

            // $stid = oci_parse($connection, "INSERT INTO collection_slot(COLLECTION_DAY, COLLECTION_TIME)
            // VALUES('$collection_slot', '$collection_time')");

            //collection slot must be at least 24 hours after placing the order
            //There will be a maximum of 20 orders per slot.

        }
        ?>
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

        <!-- paypal  -->
        <script src="https://www.paypal.com/sdk/js?client-id=ARn5KJn-eilW0fIlwqhdKuX16-oxpJd-twg42O2y6JSm9C8UiE5sZSN6OZdeVgoFQboofs2BYzpg-rcD"></script>

        <script src="./index.js"></script>
        <!--Bootstrap JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <!--Custom JS-->
        <script src="scripts/javascript.js"></script>
</body>

</html>