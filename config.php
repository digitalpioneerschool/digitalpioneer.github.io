<?php
ob_start(); // Start output buffering

// Database configuration
define('DB_SERVER', 'localhost:3307');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'school_portal');

// Attempt to connect to MySQL database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Create database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS " . DB_NAME;
if(mysqli_query($conn, $sql)) {
    // Select the database
    mysqli_select_db($conn, DB_NAME);
} else {
    die("ERROR: Could not create database. " . mysqli_error($conn));
}

// Set charset to utf8
mysqli_set_charset($conn, "utf8");

// Email configuration
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_USERNAME', 'digitalpioneertraininginstitut@gmail.com');
define('SMTP_PASSWORD', 'yretgoglhibzosxs');
define('SMTP_FROM_EMAIL', 'digitalpioneertraininginstitut@gmail.com');
define('SMTP_FROM_NAME', 'School Portal');
?> 