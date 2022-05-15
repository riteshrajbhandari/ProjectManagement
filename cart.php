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
                        <li class="nav-item me-2">
                            <a class="nav-link" aria-current="" href="#">Browse by Category</a>
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
                                session_start();

                                if (isset($_SESSION['user'])) {
                                    echo '<br/>Welcome, ' . $_SESSION['user'] . '!';
                                } else echo 'Login/Register';
                                ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php
                                if (isset($_SESSION['user'])) {
                                    echo '<li><a class="dropdown-item" href="./account-settings/customersettings.php">Account Settings</a></li>';
                                    echo '<li><a class="dropdown-item" href="logout.php">Logout</a></li>';
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
    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];

        $stid = oci_parse($connection, "SELECT * FROM cart, cart_product, product WHERE  cart.FK2_USER_ID = '$user_id' and 
        cart.cart_id = cart_product.cart_id and 
        product.product_id = cart_product.product_id");
        oci_execute($stid);
        $error = true;
        $total = 0.0;
        ?>
        <div class="container">
            <div class="row product">
                <div class="col-lg-6">
                    <table>
                        <tr>
                            <td>Item</td>
                            <td>Price</td>
                            <td>Quantity</td>
                            <td>Subtotal</td>
                        </tr>
                        <?php
                        while (($row = oci_fetch_array($stid, OCI_ASSOC)) != false) {
                            $error = false;
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
    
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Saepe esse ea odit obcaecati neque dolore maiores assumenda, doloremque accusamus suscipit.
                </div>
                <div class="col-lg-6">
                    <?php
                    if (!$error) {
                        echo 'Total: ' . $total; ?>
                        <form action="" method="post"><?php
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
                                                        $todays_date = date("d-M-y");
    
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
                                    echo '<option value="' . $days[$i] . '">' . $days[$i] . ' ' . $next_available_date . '</option>';
                                }
                                if ($counter < 2) { //if there is only friday left,
                                    for ($j = 4; $j < 6; $j++) { //show also the next week's wednesday & thursday
                                        $new_next_available_date = date('d-M-y', strtotime($next_available_date . ' + ' . ($j + 1) . ' days'));
                                        echo '<option value="' . $days[$j] . '">' . $days[$j] . ' ' . $new_next_available_date . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </form>
                    <?php
                    } else echo "You don't have anything in your cart yet."; ?>
                    <!-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam natus fugiat vel numquam impedit nihil fuga, dolorem veniam at asperiores? -->
                </div>
    
            </div>
        </div><?php
    }else echo '<a href="login.php">Login</a> to display your cart'?>
    

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
                        <li><a href="http://">Browse By Category</a></li>
                        <li><a href="http://">Contact</a></li>
                        <li><a href="http://">Login</a></li>
                    </ul>
                </div>
                <div class="col-md-1"></div>

                <div class="col-md my-auto" id="footer">
                    <a href="./about.html">
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