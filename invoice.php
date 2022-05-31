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
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Invoice</title>
</head>

<body style="background-color: #eee;">
    <div class="container py-5 my-5 ">
        <div class="card">
            <div class="card-header ">
                <div class="pt-3">
                    Invoice

                    <?php
                    $user_id = $_SESSION['user_id'];
                    $stid = oci_parse($connection, "SELECT ORDER_DATE, CS.COLLECTION_DAY, CS.COLLECTION_TIME  FROM ORDERS, COLLECTION_SLOT CS
                WHERE FK1_PAYMENT_ID = (SELECT MAX(FK1_PAYMENT_ID) FROM ORDERS)
                AND ORDERS.FK2_SLOT_ID = CS.SLOT_ID");




                    // SELECT O.FK2_SLOT_ID, CS.COLLECTION_DAY, CS.COLLECTION_TIME, 
                    // (P.UNIT_PRICE * OP.PRODUCT_QUANTITY) AS SUBTOTAL FROM ORDERS O, ORDER_PRODUCT OP, PRODUCT P, COLLECTION_SLOT CS
                    // WHERE O.FK1_PAYMENT_ID = (SELECT MAX(FK1_PAYMENT_ID) FROM ORDERS WHERE FK3_USER_ID='$user_id') 
                    // AND O.FK3_USER_ID = '$user_id'
                    // AND O.ORDER_ID = OP.ORDER_ID 
                    // AND P.PRODUCT_ID = OP.PRODUCT_ID
                    // AND O.FK2_SLOT_ID = CS.SLOT_ID









                    oci_execute($stid);
                    if ($row = oci_fetch_array($stid, OCI_ASSOC)) {
                        $completecollslot = $row['COLLECTION_DAY'] . ' ' . $row['COLLECTION_TIME'];
                        $order_date = $row['ORDER_DATE'];
                    }
                    echo '<strong>' . $order_date . '</strong>';
                    echo '<div class="text-end"><strong>' . $completecollslot . '</strong></div>'; ?></div>
            </div>
            <div class="w-100 p-2"><img src="../ProjectManagement/images/logo(small).png" alt=""></div>

            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-sm-8">
                        <h6 class="mb-3">From: Fresh Mart</h6>

                    </div>

                    <div class="col-sm-4">
                        <h6 class="mb-3">To:
                            <?php $stid = oci_parse($connection, "SELECT FIRST_NAME, LAST_NAME FROM USERS WHERE USER_ID = '$user_id'");
                            oci_execute($stid);
                            if ($row = oci_fetch_array($stid, OCI_ASSOC)) {
                                $fullname = $row['FIRST_NAME'] . ' ' . $row['LAST_NAME'];
                            }
                            echo $fullname; ?>
                        </h6>

                    </div>



                </div>

                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="center">#</th>
                                <th>Item</th>
                                <th>Description</th>
                                <th class="right">Unit Cost</th>
                                <th class="center">Qty</th>
                                <th class="right">Total</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $stid = oci_parse(
                                $connection,
                                "SELECT P.PRODUCT_NAME, P.SHORT_DESCRIPTION, P.UNIT_PRICE, OP.PRODUCT_QUANTITY, O.FK2_SLOT_ID, CS.COLLECTION_DAY, CS.COLLECTION_TIME, 
(P.UNIT_PRICE * OP.PRODUCT_QUANTITY) AS SUBTOTAL FROM ORDERS O, ORDER_PRODUCT OP, PRODUCT P, COLLECTION_SLOT CS
WHERE O.FK1_PAYMENT_ID = (SELECT MAX(FK1_PAYMENT_ID) FROM ORDERS WHERE FK3_USER_ID='$user_id') 
AND O.FK3_USER_ID = '$user_id'
AND O.ORDER_ID = OP.ORDER_ID 
AND P.PRODUCT_ID = OP.PRODUCT_ID
AND O.FK2_SLOT_ID = CS.SLOT_ID"

                            );
                            $counter = 0;
                            oci_execute($stid);
                            //  exit();
                            $grandtotal = 0;
                            $completecollslot;
                            while (($row = oci_fetch_array($stid, OCI_ASSOC)) != false) {
                                $grandtotal += $row['SUBTOTAL'];
                            ?>
                                <tr>
                                    <td class="center"><?php echo ++$counter; ?></td>
                                    <td class="left strong"><?php echo $row['PRODUCT_NAME']; ?></td>
                                    <td class="left"><?php echo $row['SHORT_DESCRIPTION']; ?></td>
                                    <td class="right">$<?php echo $row['UNIT_PRICE']; ?></td>
                                    <td class="center"><?php echo $row['PRODUCT_QUANTITY']; ?></td>
                                    <td class="right">$<?php echo $row['SUBTOTAL']; ?></td>
                                </tr>
                                <!-- $row['PRODUCT_NAME'];
        $row['SHORT_DESCRIPTION'];
        $row['PRODUCT_QUANTITY'];
        $row['UNIT_PRICE'];
        $row['SUBTOTAL']; -->
                            <?php } ?>
                            <tr>
                                <td></td>
                                <td><b>Grand Total</b></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>$<?php echo $grandtotal ?></td>

                            </tr>
                        </tbody>
                    </table>

                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-5">
                        <button onclick="printFunction()">Save as Pdf</button>

                        <script>
                            function printFunction() {
                                window.print();
                            }
                        </script>
                        <a href="http://localhost/ProjectManagement/index.php">Go back</a>
                    </div>



                </div>

            </div>
        </div>
    </div>
    <?php //header('Location:cart.php');
    ?>
</body>

</html>