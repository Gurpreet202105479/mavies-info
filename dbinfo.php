<?php


$host = "localhost";
$username = "root";
$password = "";
$database = 'Gurpreet';

$con = mysqli_connect($host, $username, $password, $database);

if (!$con)
{
    die("Connection failed!" . mysqli_connect_error());
}

?>
