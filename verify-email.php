<?php
include('connection.php');
if (isset($_GET['token'])) {
    $tokenfromemail = $_GET['token'];
    $stid = oci_parse($connection, "SELECT TOKEN, user_id FROM USERS WHERE TOKEN = '$tokenfromemail'");
    oci_execute($stid);
    if ($row = oci_fetch_array($stid, OCI_ASSOC)) {
        $user_id = $row['USER_ID'];
        $stid1 = oci_parse($connection, "UPDATE USERS SET VERIFIED=1 WHERE USER_ID='$user_id'");
        if(oci_execute($stid1)) echo "verified";
    }
}
