<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname="customer";



if(!$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname)){

    die("failed to connect!");
}


?>