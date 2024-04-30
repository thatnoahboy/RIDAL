<?php
// Database configuration
$dbHost = 'localhost'; // Database host (e.g., localhost)
$dbUsername = 'root'; // Database username
$dbPassword = ''; // Database password
$dbName = 'user_data'; // Database name

// Attempt to connect to the database
$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
