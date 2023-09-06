<?php
$host = "localhost";
$url_db = "CRUD";
$user = "root";
$pass = "";

$db = mysqli_connect($host, $user, $pass, $url_db);
if (!$db) {
    die("connection failed ".mysqli_connect_error());
}
?>