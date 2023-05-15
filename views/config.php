<?php

    $host = "localhost"; /* Host name */
    $user = "root"; /* User */
    $password = ""; /* Password */
    $dbname = "post_data"; /* Database name */

    $con = mysqli_connect($host, $user, $password,$dbname);
    // Check connection
    if (!$con) {
     die("Connection failed: " . mysqli_connect_error());
    }

    $chartQuery = "SELECT * FROM pte_chart";
    $chartQueryRecords = mysqli_query($con,$chartQuery);
?>