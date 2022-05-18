<?php
$connection = oci_connect('C7261154', 'HelloWorld123', 'localhost/XE');
if (!$connection) {
    $m = oci_error();
    echo $m['message'], "\n";
    exit;
} 
// else {
//     print "Connected to Oracle!";
// }
// oci_close($connection);
