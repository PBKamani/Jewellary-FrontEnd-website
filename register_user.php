<?php
// Database connection setup
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_login"; // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate input (basic validation)
    if (empty($email) || empty($password)) {
        echo "Email and password are required.";
    } else {
        // Hash the password for security
        $hashedPassword = md5($password);

        // Insert user into database
        $sql = "INSERT INTO users (email, password) VALUES ('$email', '$hashedPassword')";

        if ($conn->query($sql) === TRUE) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
