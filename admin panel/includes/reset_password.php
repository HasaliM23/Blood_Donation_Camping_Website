<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $new_password = $_POST['password'];

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "blood_donation";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Update the password in the database
    $sql = "UPDATE donors SET password = ? WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $new_password, $email);

    if ($stmt->execute()) {
        echo "<script>alert('Password updated successfully.')</script>";
        echo "<script>window.open('../security.php','_self')</script>";
    } else {
        echo "<script>alert('Error updating password.')</script> " . $conn->error;
        echo "<script>window.open('../security.php','_self')</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
