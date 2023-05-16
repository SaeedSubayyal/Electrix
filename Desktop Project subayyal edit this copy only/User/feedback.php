<?php
// Database connection configuration
$servername = "localhost";
$dbUsername = "root";
$password = "";
$dbname = "electrix";

// Create a new MySQLi object
$conn = new mysqli($servername, $dbUsername, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Check if the form is submitted
var_dump($_POST["ResponseTime"]);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data

    $responseTime = $_POST["ResponseTime"] == "yes" ? 1:0;
    $linemanProfession = $_POST["LinemanProfession"] == "yes" ? 1 : 0;
    $bribe = $_POST["Bribe"] == "yes" ? 1 : 0;
    $connection = $_POST["Connection"] == "yes" ? 1 : 0;
    $price = $_POST["Price"] == "yes" ? 1 : 0;
    $complaints = $_POST["Complaints"];
    $formUsername = $_POST["Username"];

    // Prepare the SQL statement
    if (!empty($responseTime) && !empty($linemanProfession)&& !empty($bribe) &&!empty($connection) &&
    !empty($price) && !empty($complaints) && !empty($formUsername) ){
        die ("Hello Bitches ");
    $SQL = "INSERT INTO feedback (response_time, lineman_profession, bribe, connection, price, complaints, username) VALUES ($responseTime, $linemanProfession, $bribe, $connection, $price, '$complaints', '$formUsername')";
    mysqli_query($conn, $SQL);  

    if (mysqli_error($conn)) {
        echo mysqli_error($conn);
    } else {
        echo '<script>alert("Successful Submission of Feedback");</script>';
        header("Location: http://localhost/electrix/Feedback.html");
       // echo "Registration is successful";
    }
 }
 else {
    header("Location: http://localhost/electrix/Feedback.html");

 }
}
// $conn->close();
?>
