<?php
// Enable error reporting for debugging purposes
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? null;
    $password = $_POST['password'] ?? null;

    if ($username && $password) {
        // Database connection
        $host = "localhost";
        $dbUsername = "root";  // Change these credentials as needed
        $dbPassword = "";
        $dbName = "blood_donation";     // Ensure this database exists and has a table with the correct structure

        // Create connection
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Validation login authentication using prepared statements to prevent SQL injection
        $query = "SELECT * FROM admin WHERE username = ? AND password = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            // Login success
            header("Location: A_profile.html");
            exit();
        } else {
            // Login failed
            header("Location: A_error.html");
            exit();
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "Please enter both username and password.";
    }
}
?>
