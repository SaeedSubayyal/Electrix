<?php

error_reporting(E_ALL);
define("host", "localhost");
define("username", "root");
define("password", "");
define("dbname", "electrix");

$conn = mysqli_connect(host, username, password, dbname);
mysqli_commit($conn);

error_reporting(E_ALL);
// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Check if the form is submitted
//var_dump($_SERVER["REQUEST_METHOD"]);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data

    $responseTime = $_POST["ResponseTime"] == "yes" ? 1:0;
    $linemanProfession = $_POST["LinemanProfession"] == "yes" ? 1 : 0;
    $bribe = $_POST["Bribe"] == "yes" ? 1 : 0;
    $connection = $_POST["Connection"] == "yes" ? 1 : 0;
    $price = $_POST["Price"] == "yes" ? 1 : 0;
    $complaints = $_POST["Complaints"];
    $formUsername = $_POST["Username"];


       // die ("Hello Bitches ");
    $SQL = "INSERT INTO feedback (response_time, lineman_profession, bribe, connection, price, complaints, username) VALUES ($responseTime, $linemanProfession, $bribe, $connection, $price, '$complaints', '$formUsername')";
    mysqli_query($conn, $SQL);  

    if (mysqli_error($conn)) {
        echo mysqli_error($conn);
    } else {
        echo '<script>alert("Successful Submission of Feedback");</script>';
       // header("Location: http://localhost/electrix/Feedback.html");
        //echo "Registration is successful";
    }
 }
 else {
    echo '<script>alert("Not Successful Submission of Feedback");</script>';
    //header("Location: http://localhost/electrix/Feedback.html");
 }
// $conn->close();
?>
