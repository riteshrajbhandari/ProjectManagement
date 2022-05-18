<?php
include('connection.php');
session_start();
$user_id = $_POST['user_id'];
$product_id = $_POST['producttoremove'];

$stid = oci_parse($connection, "DELETE FROM CART_PRODUCT WHERE CART_ID = 
(SELECT CART_ID FROM CART WHERE FK2_USER_ID = '$user_id')
AND PRODUCT_ID ='$product_id'");

if(oci_execute($stid))header('Location: cart.php');
?>