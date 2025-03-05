<?php
// Database connection settings
$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "mobile shop";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $message = $_POST["message"];

    // Prepare SQL statement
    $sql = "INSERT INTO `new` (fname, lname, email, mobile, message) VALUES (?, ?, ?, ?, ?)";
    
    // Bind parameters and execute query
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $fname, $lname, $email, $mobile, $message);
    
    if ($stmt->execute()) {
        echo "Thank you for your message! <a href='index.html'>Go to Home Page</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
