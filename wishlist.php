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

        $stid = oci_parse($connection, "SELECT * FROM wishlist, wishlist_product, product WHERE  wishlist.FK1_USER_ID = '$user_id' and 
        wishlist.wishlist_id = wishlist_product.wishlist_id and 
        product.product_id = wishlist_product.product_id");
        oci_execute($stid);
    ?>
        <div class="container">



            <div class="row product m-5 " style=" border-radius: 2em; background-color:white;box-shadow: rgba(0, 0, 0, 0.56) 0px 22px 70px 4px;">
                <div class="col-lg-8 text-center">

                    <table class="table ">
                        <thead class="thead-dark">
                            <tr>
                                <td>Item</td>
                                <td>Price</td>
                            </tr>
                            <?php
                            while (($row = oci_fetch_array($stid, OCI_ASSOC)) != false) {
                                $error = false;
                                $wishlist_id = $row['wishlist_ID'];
                                $product_img_url = $row['IMG_URL'];
                                $product_name = $row['PRODUCT_NAME'];
                                $product_desc = $row['SHORT_DESCRIPTION'];
                                $unit_price = $row['UNIT_PRICE'];
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
                                        <form action="wishlist.php" method="post">
                                            <input type="number" name="producttoremove" id="producttoremove" hidden value="<?php echo $product_id; ?>">
                                            <input type="number" name="user_id" id="user_id" hidden value="<?php echo $user_id; ?>">
                                            <input type="submit" value="Delete">
                                            <input type="submit" value="add-to-cart">
                                        </form>
                                        <?php
                                            if(isset($_POST['Delete'])){
                                                $user_id = $_POST['user_id'];
                                                $product_id = $_POST['producttoremove'];
                                                
                                                $stid = oci_parse($connection, "DELETE FROM WISHLIST_PRODUCT WHERE WISHLIST_ID = 
                                                (SELECT WISHLIST_ID FROM WISHLIST WHERE FK1_USER_ID = '$user_id')
                                                AND PRODUCT_ID ='$product_id'");
                                            }}
                                        ?>







<?php


if (isset($_POST['add-to-wishlist'])) {

    if (isset($_SESSION['user_id'])) {


$user_id = $_SESSION['user_id'];


$total_price = $unit_price;

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
            '$pid',1,'$total_price')");
        if (oci_execute($stid)) echo "Item added";
    }        
?>



















                                    </td>
                                </tr><?php
                                        // echo '<a href="delete.php?pid=">Remove</a>'
                                    } ?>
                        </thead>
                    </table>

                    <!-- Lorem ipsum, dolor sit amet consectetur adipisicing elit. Saepe esse ea odit obcaecati neque dolore maiores assumenda, doloremque accusamus suscipit. -->
                </div>
                
            </div>
        </div><?php
            } else echo '<a href="login.php">Login</a> to display your cart' }?>



<?php
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
                    
                    <!-- <div class='paypal-ko-details' id='paypal-ko-details'></div> -->
                    
                









                    
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
                   console.log(details);
                //    const detailobj = details.status;
                //    document.getElementById("paypal-ko-details").innerHTML=details.status; 
                    // const detailobj = details;
                    window.location.replace("http://localhost/ProjectManagement/checkpaypal.php?payment="+details.status);
                })
            },
            onCancel: function(data) {
                window.location.replace("http://localhost/ProjectManagement/paypal_integration/Oncancel.php")
            }
        }).render('#paypal-payment-button');
    </script>


    <?php
    if (isset($_POST['checkout'])) {
    }
    ?>




    <!--Bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!--Custom JS-->
    <!-- <script src="scripts/javascript.js"></script> -->
    <!-- ov4+1p" crossorigin="anonymous"></script> -->
    <!--Custom JS-->
    <!-- <script src="scripts/javascript.js"></script> -->