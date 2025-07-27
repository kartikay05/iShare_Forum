<?php
// Script to connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$database = "iShare";

$conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn){
    die("Connection Error: ". mysqli_connect_error());
}
?>