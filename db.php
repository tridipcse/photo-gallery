<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "photo_gallery";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error)
{
    echo "database connection failed!" . $conn->connect_error;
}
?>
