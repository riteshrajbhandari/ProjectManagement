<form action="">

 <!-- Checkout Button -->
 <div id="paypal-payment-button" class="col-lg-12 pb-5 cart-submit" name="paypal-button">
                           
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
