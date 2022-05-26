<?php
include('connection.php');
if (isset($_POST['paymentconfirm'])) {
    if ($_POST['paymentconfirm'] == 'COMPLETED') {
        // echo "HEREEEE";
        //sql here
        // echo 'value will be inserted into sql';
        $user_id = $_GET['user_id'];
        $total = $_GET['total'];
        $stid = oci_parse($connection, "UPDATE PAYMENT SET PAYED_AMT = $total, PAYMENT_DATE = 
        WHERE FK1_USER_ID = '$user_id' AND PAYMENT_ID = (SELECT MAX(PAYMENT_ID) FROM PAYMENT)");
        oci_execute($stid);
        // after payment = true, clear collection slot and cart
        // echo 'hereeee';

        $stid = oci_parse($connection, "UPDATE ORDERS SET FK1_PAYMENT_ID = 
            (SELECT MAX(PAYMENT_ID) FROM PAYMENT WHERE FK1_USER_ID = '$user_id') 
        WHERE FK3_USER_ID = '$user_id' AND 
        ORDER_ID = (SELECT MAX(ORDER_ID) FROM ORDERS WHERE FK3_USER_ID = '$user_id')");
        oci_execute($stid);

//         echo 'HEREEEEE!!!!!!';
// exit();

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
        header("Location:invoice.php");
    }
}

