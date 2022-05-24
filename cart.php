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
        product.product_id = cart_product.product_id");
        oci_execute($stid);
        $error = true;
        $total = 0.0;
    ?>
        <div class="container">



            <div class="row product m-5 " style=" border-radius: 2em; background-color:white;box-shadow: rgba(0, 0, 0, 0.56) 0px 22px 70px 4px;">
                <div class="col-lg-8 text-center">

                    <table class="table ">
                        <thead class="thead-dark">
                            <tr>
                                <td>Item</td>
                                <td>Price</td>
                                <td>Quantity</td>
                                <td>Subtotal</td>
                            </tr>
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
                                    <td class="text-start"><img class="img-cart img-thumbnail w-50" src="<?php echo $product_img_url; ?>" alt="" srcset="">
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
                        </thead>
                    </table>

                    <!-- Lorem ipsum, dolor sit amet consectetur adipisicing elit. Saepe esse ea odit obcaecati neque dolore maiores assumenda, doloremque accusamus suscipit. -->
                </div>
                <div class="col-lg-4" style="background-color:rgba(211, 210, 210, 0.77) ;border-top-right-radius:2em; border-bottom-right-radius: 2em    ;">


<div class="text-center  py-3 lead " style="font-family:bold ; font-size:2em;"><?php
                    if (!$error) {
                        echo 'Total: £' . $total; ?>
 <hr>
                    </div>

<form action="./cart.php" method="post"><?php
   // TODO:: check if today is wednesday, thursday or friday
// check if today is wednesday, thursday or friday
// if it is, add today and the days after today until friday.
// if not, while today doesn't reach wednesday, keep incrementing day and
// when it does reach wednesday, add today and the days after today until friday
$days_of_collection = array('Wed', 'Thu', 'Fri');
$days = array('Sat', 'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri');
$today = date("D");
// $today = 'Sat';
// $today = date("D", strtotime("-2 days", strtotime(date("D"))));
// $chosen_day = $days[0];
$counter = 0;

$day_index = array_search($today, $days); //get the index of the day today with respect to the days array
// $todays_date = date("d-M-y");
 //TODO

// $todays_date = date("d-M-y", strtotime("-6 days", strtotime(date("Y-m-d"))));

while (!in_array($today, $days_of_collection)) { //while a given day is not within collection slot days,
    $day_index++;
    //time travel to the next day
    $today = $days[$day_index];                       //check if that day is in the list
    // echo $key;
} //because of this, the $key is the            //the moment it finds it in the list, exit the while loop
//difference betn the next collection
//day and today in number of days, inclusive

// function dateDiffInDays($date1, $date2)
// { // Calculating the difference in timestamps
//     $diff = strtotime($date2) - strtotime($date1);
//     return abs(round($diff / 86400));                   //btw this whole function is useless because 14th of May just HAPPENED to fall on a saturday. It's like trying to fix a hole in duct tape with another duct tape. Its duct tapes all the way down.
// }
// $that_day = "14-May-22";
// $date_temp = date("d-M-y");
// $diff_in_date = dateDiffInDays($that_day, $date_temp);
$todays_date = date("d-M-y"); //, strtotime("-" . $diff_in_date . " days", strtotime(date("Y-m-d"))));
//$day_index doesn not work because it holds the index of DAY with respect to the array starting from saturday. So adding that index number of days to the DATE part resulted in the assumption that the current date returned by date('d-M-y') always falls on a saturday. I fixed it by subtracting the index of today from the next collection slot day index that just gives the absolute difference between today'S DATE and the next collection slot's DATE. This has to be the worst code ever written. PS. NEEDS TO BE CHECKED AFTER 20 HOURS TO SEE IF IT BREAKS
$date_index = $day_index - array_search(date("D"), $days);
?>
<div class="text-center py-5">
<select name="collection_slot" id="collection_slot" default="Collection Slot">
    <option value="">Choose a collection slot</option>
    <?php
    for ($i = $day_index; $i < 7; $i++) {   //loops from that day onward till friday to view available collection days
        $counter++;
        //get todays date, add $i no of days to it and display it from there
        $next_available_date = date('d-M-y', strtotime($todays_date . ' + ' . $date_index++ . ' days')); //the $i counts from saturday every time . instead, you need to start counting from TODAY
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

<div class="text-center py-5"><select name="collection_time" id="collection_time">
                                <option value="10:00 - 13:00">10:00 - 13:00</option>
                                <option value="13:00 - 16:00">13:00 - 16:00</option>
                                <option value="16:00 - 19:00">16:00 - 19:00</option>
                            </select></div>
                            
                            <!-- Checkout Button -->
                            <div id="paypal-payment-button" class="col-lg-12 pb-5 cart-submit" name="paypal-button">
                                <!-- <input type="submit"  value="Checkout" name="checkout"> -->


                        </div>
                    </form>
                <?php
                                                    // echo $day_index;
                                                } else echo "You don't have anything in your cart yet."; ?>
              
                </div>

            </div>
        </div><?php
            } else echo '<a href="login.php">Login</a> to display your cart' ?>


    <?php

    // include('payment.php');
    // if(isset($paymentsuccess)){
    //     if($paymentsuccess==true){

    //     }
    // }!#!#!#!#!#!#!#!#!##!!#!#!###!##!#!#!!!!!!!!!! //TOOO after paypal
    if (isset($_POST['paypal-button'])) {
        $collection_slot = $_POST['collection_slot'];
        $collection_time = $_POST['collection_time'];
        $order_date = date("d-M-y");
        // print_r($collection_slot);
        // print_r($order_date);
        $errors = false;
        $stid = oci_parse($connection, "SELECT COUNT(order_id) FROM orders, collection_slot CS WHERE ORDERS.FK2_SLOT_ID = CS.SLOT_ID AND CS.COLLECTION_DAY = '$collection_slot'");
        oci_execute($stid);

        if (($row = oci_fetch_array($stid, OCI_ASSOC))) {
            if ($row['COUNT(ORDER_ID)'] > 20) {
                echo "There are already more than 20 orders for that slot. Please the next one.";
                $errors = true;
            }
        }
    }
                //TODO how to check for this
    if (isset($_POST['paypal-success'])) {
        if (!$errors) {
            $stid = oci_parse($connection, "INSERT INTO collection_slot(COLLECTION_DAY, COLLECTION_TIME)
    VALUES('$collection_slot', '$collection_time')");
            oci_execute($stid);

            $stid = oci_parse($connection, "INSERT INTO orders (
            GROSS_PRICE,
            ORDER_DATE,
            CART_ID,
            FK2_SLOT_ID,
            FK3_USER_ID)
            VALUES ('$total','$order_date',
                (SELECT cart_id FROM CART WHERE FK2_USER_ID = '$user_id'), 
                (SELECT MAX(slot_id) FROM COLLECTION_SLOT cs, orders, users WHERE COLLECTION_DAY = '$collection_slot' 
                    AND COLLECTION_TIME = '$collection_time' 
                    and cs.slot_id = orders.FK2_SLOT_ID
                    and orders.FK3_USER_ID = users.user_id
                    and users.user_id = '$user_id'),
            '$user_id')");
            oci_execute($stid);




            $stid = oci_parse($connection, "SELECT cart_id FROM cart WHERE FK2_USER_ID = '$user_id'");
            oci_execute($stid);
            if ($row = oci_fetch_array($stid, OCI_ASSOC)) {
                // $product_name = ucwords(strtolower($row['PRODUCT_NAME']));
                $cart_to_be_deleted = $row['CART_ID'];

                $stid = oci_parse($connection, "DELETE FROM cart_product WHERE cart_id = '$cart_to_be_deleted'");
                oci_execute($stid);

                $stid = oci_parse($connection, "DELETE FROM cart WHERE cart_id = '$cart_to_be_deleted'");
                oci_execute($stid);
            }
        }
    }

    ?>



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
    <script src="https://www.paypal.com/sdk/js?client-id=AaNtGY8TocSYYuuJVpWFdXZ6tBxYh9rKu4Vals3L1V8LfF0qzyQFz-hWin5KOpeQG4hlbQbs-LmfvjCa"></script>

    <!-- <script src="./index.js"></script> -->
    <script>
        paypal.Buttons({

            style: {
                color: 'blue',
                shape: 'pill',
                layout: 'horizontal'
            },
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '<?php echo $total; ?>'
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    console.log(details)
                    // window.location.replace(url:"")
                })
            }

        }).render('#paypal-payment-button');
    </script>
    <!--Bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!--Custom JS-->
    <script src="scripts/javascript.js"></script>
    <!-- ov4+1p" crossorigin="anonymous"></script> -->
    <!--Custom JS-->
    <script src="scripts/javascript.js"></script>