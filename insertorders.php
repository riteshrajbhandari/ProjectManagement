<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include('connection.php');
    session_start();
    $user_id = $_SESSION['user_id'];
    
    if ($_POST['collection_slot'] == '' or !isset($_POST['collection_slot'])) {
        $_SESSION['error_msg'] = 'Collection slot not selected';
        header('Location:cart.php');
    } 
    else $collection_slot = $_POST['collection_slot'];
        
    $collection_time = $_POST['collection_time'];
    $total = $_POST['total'];
    $list_of_pid_quantity = $_GET['list_of_pid_quantity'];


    // print_r($list_of_pid_quantity);
    // exit();

    $stid = oci_parse($connection, "SELECT cart.cart_id FROM cart, cart_product, product WHERE  
    cart.FK2_USER_ID = '$user_id' and 
        cart.cart_id = cart_product.cart_id and 
        product.product_id = cart_product.product_id");
    oci_execute($stid);
    if ($row = oci_fetch_array($stid, OCI_ASSOC)) {
        $cart_id = $row['CART_ID'];
    }

    echo 'Collection Slot: ' . $collection_slot . '<br>';
    echo 'Collection Time: ' . $collection_time . '<br>';
    echo 'Total: £' . $total . '<br>';
    // echo 'Cart id     ' . $cart_id . '<br>';

    // $stid = oci_parse($connection, "INSERT INTO USERS(FIRST_NAME, LAST_NAME, DATE_JOINED, USERNAME, PASSWORD, USER_TYPE, EMAIL, PROFILE_PIC_URL, GENDER, DATE_OF_BIRTH, VERIFIED, TOKEN)
    // VALUES('$firstname', '$lastname', '$date_today', '$username', '$password', '$user_type', '$email', '$image_name', '$gender', '$dob','0','$token')");
    // if (oci_execute($stid)) {
    // echo 'Account created. Please follow the link sent in your email to verify.'; //TODO:left to send email
    // };

    ?>
    <form action="cart.php" method="post" id="cart">
        <div id="paypal-payment-button" class="col-lg-12 pb-5 cart-submit" name="paypal-payment-button">
        </div>
    </form>
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
                            value: <?php echo $total; ?>
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
                    window.location.replace("http://localhost/ProjectManagement/checkpaypal.php?payment=" + details.status + "&collection_slot=<?php echo $collection_slot; ?>&collection_time=<?php echo $collection_time; ?>&total=<?php echo $total; ?>&list_of_pid_quantity=<?php echo $list_of_pid_quantity ?>");
                })
            },
            onCancel: function(data) {
                window.location.replace("http://localhost/ProjectManagement/cart.php")
            }
        }).render('#paypal-payment-button');
    </script>
</body>

</html>