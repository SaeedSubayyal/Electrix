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

    parse_str(file_get_contents("php://input"), $requestData);
   // var_dump($requestData);
    $ReferenceNum = isset($requestData["arguments"][0]) ? $requestData["arguments"][0] : "";;
    $CNIC = isset($requestData["arguments"][1]) ? $requestData["arguments"][1] : "";;
    $Email = isset($requestData["arguments"][2]) ? $requestData["arguments"][2] : "";;
    $CreditCard = isset($requestData["arguments"][3]) ? $requestData["arguments"][3] : "";;
    $BillAmount = isset($requestData["arguments"][4]) ? $requestData["arguments"][4] : "";;       
    $SQL = "INSERT INTO billpayment (ReferenceNum, CNIC, BillAmount, CreditCardNumber, Email) 
        VALUES ('$ReferenceNum', '$CNIC', '$BillAmount', '$CreditCard', '$Email')";

// Proceed with executing the SQL statement and handling any errors

    mysqli_query($conn, $SQL);  

    if (mysqli_error($conn)) {
        echo mysqli_error($conn);
    } else {
        echo 'Successful Submission of Feedback';
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
