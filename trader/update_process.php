<?php
include('../connection.php');
    $pid = $_GET['pid'];
    // echo $pid;
    $name = $_POST['product_name'];
    $unit_price = $_POST['unit_price'];
    $stock = $_POST['stock'];
    $available = $_POST['available'];
    $short_desc = $_POST['short_desc'];
    $description = $_POST['description'];
    $category_id = $_POST['category_id'];
    $stid = oci_parse(
        $connection,
        "UPDATE product SET PRODUCT_NAME = '$name',
            UNIT_PRICE='$unit_price',
            STOCK='$stock',AVAILABLE='$available',
            SHORT_DESCRIPTION='$short_desc',
            PRODUCT_DESCRIPTION='$description',
            FK3_CATEGORY_ID='$category_id' WHERE PRODUCT_ID = '$pid'"
    );
    oci_execute($stid);
    header("Location: update.php");
?>