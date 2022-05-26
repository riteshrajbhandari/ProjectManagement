<?php
include('connection.php');
session_start();
$user_id = $_SESSION['user_id'];
$collection_slot =  $_GET['collection_slot'];
$collection_time = $_GET['collection_time'];
$total = $_GET['total'];
$list_of_pid_quantity = $_GET['list_of_pid_quantity'];
$order_date = date("d-M-y");
$errors = false;

// exit();

// foreach ($array_of_pid_quantity as $value) {
//     $temp = explode('-', $value);
//     array_push($assoc_array_of_pid_quantity, $temp);
// }
// print_r($assoc_array_of_pid_quantity);
// exit();
// foreach ($assoc_array_of_pid_quantity as $key => $value) {
//     foreach ($value as $pid => $quantity) {
//         echo "Pid=" . $quantity['0'] . ", Quantity=" . $quantity['1'];
//         // print_r($value);
//         echo "<br>";
//     }
// }
// exit();
// print_r($assoc_array_of_pid_quantity);

// echo $collection_slot;
//INSERTING INTO EVERYTHING EXCEPT THE PAYMENT CONFIRMATION
$stid = oci_parse($connection, "SELECT COUNT(order_id) FROM orders, collection_slot CS WHERE ORDERS.FK2_SLOT_ID = CS.SLOT_ID AND CS.COLLECTION_DAY = '$collection_slot'");
if (!oci_execute($stid)) exit();
if (($row = oci_fetch_array($stid, OCI_ASSOC))) {
    if ($row['COUNT(ORDER_ID)'] > 20) {
        echo "There are already more than 20 orders for that slot. Please try the next one.";
        $errors = true;
        exit();
    }
}

if (!$errors) {
    $stid = ociparse($connection, "INSERT INTO COLLECTION_SLOT(COLLECTION_DAY, COLLECTION_TIME)
    VALUES('$collection_slot', '$collection_time')");
    if (!oci_execute($stid)) exit();
}

$stid = oci_parse($connection, "INSERT INTO orders (
            GROSS_PRICE,
            ORDER_DATE,
            CART_ID,
            FK2_SLOT_ID,
            FK3_USER_ID)
            VALUES ('$total','$order_date',
                (SELECT cart_id FROM CART WHERE FK2_USER_ID = '$user_id'), 
                (SELECT MAX(SLOT_ID) FROM COLLECTION_SLOT WHERE 
                COLLECTION_DAY = '$collection_slot' AND COLLECTION_TIME='$collection_time'),
            '$user_id')");
if (!oci_execute($stid)) exit();


$array_of_pid_quantity = explode('-', $list_of_pid_quantity);
for ($i = 0; $i < count($array_of_pid_quantity); $i += 2) {
    if (!$array_of_pid_quantity[$i] == '') {
        $pid = $array_of_pid_quantity[$i];
        $quantity = $array_of_pid_quantity[$i + 1];
        $stid = oci_parse($connection, "INSERT INTO ORDER_PRODUCT
        (ORDER_ID, PRODUCT_ID, PRODUCT_QUANTITY)
        VALUES((SELECT MAX(ORDER_ID) FROM ORDERS WHERE FK3_USER_ID = $user_id), '$pid', '$quantity')");
        oci_execute($stid);
    }
}

$stid = oci_parse($connection, "INSERT INTO PAYMENT(
            PAYMENT_METHOD,
            NET_PRICE,
            PAYED_AMT,
            RETURNED_AMT,
            -- PAYMENT_DATE,
            FK1_USER_ID) VALUES ('paypal','$total', 0, 0,'$user_id')");
if (!oci_execute($stid)) exit();
// $_SESSION['cart_id'] = $cart_id;
?>

<form action="update-delete.php?user_id=<?php echo $user_id;?>&total=<?php echo $total;?>" method="post" id="myForm">

    <input type="text" value="<?php echo $_GET['payment']; ?>" name="paymentconfirm" type="submit">
</form>
<script>
    document.getElementById("myForm").submit();
</script>