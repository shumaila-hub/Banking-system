<?php
$servername = "sql102.epizy.com";
$username = "epiz_30633193";
$password = "cldahhV9uWG";
$databasename = "epiz_30633193_bank";
$conn = mysqli_connect($servername, $username, $password, $databasename);
if (!$conn) {
    die("Connection Failed!");
}



?>