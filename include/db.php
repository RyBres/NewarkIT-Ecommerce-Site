<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'newark-it';

$conn = new mysqli($host, $user, $password, $database);

// Check for connection errors
if ($conn->connect_error) {
    die('Database connection failed: ' . $conn->connect_error);
}
?>