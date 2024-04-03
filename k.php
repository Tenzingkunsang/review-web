<?php

// Database connection details
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$database = "hotel_reviews";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hotelName = $_POST["hotelName"];
    $rating = $_POST["rating"];
    $review = $_POST["review"];

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO reviews (hotel_name, rating, review_text) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $hotelName, $rating, $review);

    // Execute SQL statement
    if ($stmt->execute() === TRUE) {
        echo "Review submitted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();

?>
