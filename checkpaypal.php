<form action="cart.php" method="post" id="myForm">

    <input type="text" value="<?php echo $_GET['payment']; ?>" name="paymentconfirm" type="submit">
</form>
<script>
    document.getElementById("myForm").submit();
</script>