<?php
// registration.php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Connect to database (update your database parameters)
    $host = 'localhost'; // Change as necessary
    $db = 'your_database'; // Change as necessary
    $user = 'your_username'; // Change as necessary
    $pass = 'your_password'; // Change as necessary

    $conn = new mysqli($host, $user, $pass, $db);

    // Check connection
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Basic input validation
    if (empty($username) || empty($password)) {
        die('Username and password are required.');
    }

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Prepare and bind
    $stmt = $conn->prepare('INSERT INTO users (username, password) VALUES (?, ?)');
    $stmt->bind_param('ss', $username, $hashed_password);

    // Execute the statement
    if ($stmt->execute()) {
        echo 'Registration successful!';
    } else {
        echo 'Error: ' . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <form method="POST" action="register.php">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>