<?php

// order_history.php
// Script to display user purchase history

// Start the session
session_start();

// Check if user is logged in
if(!isset($_SESSION['user_id'])) {
    echo 'You must log in to view your purchase history.';
    exit;
}

// Database connection (replace with your database credentials)
$host = 'localhost';
$db = 'your_database';
$user = 'your_username';
$pass = 'your_password';

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$user_id = $_SESSION['user_id'];

// Query to retrieve purchase history
$sql = "SELECT * FROM purchases WHERE user_id = ? ORDER BY purchase_date DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Display purchase history
if ($result->num_rows > 0) {
    echo '<h1>Your Purchase History</h1>';
    while($row = $result->fetch_assoc()) {
        echo '<p>Item: ' . htmlspecialchars($row['item_name']) . ' - Date: ' . htmlspecialchars($row['purchase_date']) . '</p>';
    }
} else {
    echo 'No purchases found.';
}

$stmt->close();
$conn->close();
?>