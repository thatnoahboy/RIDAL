<?php
// Include the database configuration file
require_once 'db_config.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $loginPhone = $_POST['login-phone'];
    $loginPassword = $_POST['login-password'];

    // Sanitize the form data to prevent SQL injection
    $loginPhone = mysqli_real_escape_string($conn, $loginPhone);

    // Fetch user data from the database based on the provided phone number
    $sql = "SELECT * FROM users WHERE phone = '$loginPhone'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // User found, verify the password
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row['password'];
        if (password_verify($loginPassword, $hashedPassword)) {
            // Password is correct, user is authenticated
            // You can start a session or set cookies here
            echo "Login successful. Redirecting to dashboard...";
            // Redirect to dashboard.html or any other page after successful login
            header("Location: dashboard.html");
            exit;
        } else {
            // Password is incorrect
            echo "Incorrect password.";
        }
    } else {
        // User not found
        echo "User not found.";
    }
}
?>
