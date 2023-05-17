<?php
// Database connection configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "electrix";

// Create a new MySQLi object
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $responseTime = $_POST["ResponseTime"];
    $linemanProfession = $_POST["LinemanProfession"];
    $bribe = $_POST["Bribe"];
    $comments = $_POST["Comments"];

    // Prepare and execute the SQL statement to store the feedback data
    $stmt = $conn->prepare("INSERT INTO feedback (response_time, lineman_profession, bribe, comments) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $responseTime, $linemanProfession, $bribe, $comments);
    $stmt->execute();

    // Check if the query was successful
    if ($stmt->affected_rows > 0) {
        // Feedback data stored successfully
        // TODO: Handle the success case, such as redirecting the user to a thank you page
        header("Location: thank_you.html");
        exit();
    } else {
        // Error occurred while storing the feedback data
        // TODO: Handle the error case
        echo "Error: " . $stmt->error;
    }

    // Close the database connection
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
