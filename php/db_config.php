<?php
$isLive = true;
// $isLive = false;
$host = 'localhost';
$dbname = $isLive ? 'intlkiho_chap' : 'cmom';
$username = $isLive ? 'intlkiho_user' : 'root';
$password = $isLive ? 'Mesomorph_1$' : 'root';

// Create connection
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>