<?php 
$conn = oci_connect('C7261155', 'HelloWorld123', 'localhost/XE');
if (!$conn) {
    $m = oci_error();
    echo $m['message'], "\n";
    exit;
} else {
    print "Connected to Oracle!";
}
// oci_close($conn);
?>