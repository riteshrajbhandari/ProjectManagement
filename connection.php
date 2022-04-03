<?php 
$conn = oci_connect('ritesh', 'HelloWorld@650#', 'Ritesh-Dell/XE');
if (!$conn) {
    $m = oci_error();
    echo $m['message'], "\n";
    exit;
} else {
    print "Connected to Oracle!";
}
oci_close($conn);
?>