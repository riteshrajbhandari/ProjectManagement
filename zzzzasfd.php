<?php
    include "connect.php";
        $stid = oci_parse($conn, 'SELECT * FROM DEPT');
        oci_execute($stid);
        
        while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
            // Use the uppercase column names for the associative array indices
            echo $row['DEPTNO']."\t";
            echo $row['DNAME']."\t";
            echo $row[2]."<br>";
        }
        
        oci_free_statement($stid);
        oci_close($conn);
    ?>