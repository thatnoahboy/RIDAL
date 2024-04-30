<?php
// Include the database configuration file
require_once 'db_config.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $verifyPassword = $_POST['verifyPassword'];

    // Validate the form data (you can add more validation as needed)
    if (empty($firstName) || empty($lastName) || empty($email) || empty($phone) || empty($password) || empty($verifyPassword)) {
        echo "All fields are required.";
        exit;
    }

    if ($password !== $verifyPassword) {
        echo "Passwords do not match.";
        exit;
    }

    // Sanitize the form data to prevent SQL injection
    $firstName = mysqli_real_escape_string($conn, $firstName);
    $lastName = mysqli_real_escape_string($conn, $lastName);
    $email = mysqli_real_escape_string($conn, $email);
    $phone = mysqli_real_escape_string($conn, $phone);
    // Hash the password for security
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Insert user data into the database
    $sql = "INSERT INTO users (firstName, lastName, email, phone, password) VALUES ('$firstName', '$lastName', '$email', '$phone', '$passwordHash')";
    if (mysqli_query($conn, $sql)) {
      header("Location: signin.html");
      exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
