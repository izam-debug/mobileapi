<?php
$dbhost = "sql104.unaux.com";
$dbuser = "unaux_30626518";
$dbpass = "mztjq47krx";
$dbname = "unaux_30626518_dbquiz";

$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($mysqli->connect_errno) {
    printf("Failed to connect to database");
    exit();
}
?>