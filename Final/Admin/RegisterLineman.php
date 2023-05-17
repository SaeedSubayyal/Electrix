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
   $Name = ($requestData["arguments"][0]);
   $Email = ($requestData["arguments"][1]);
   $PhoneNum = ($requestData["arguments"][2]);
   $CNIC = ($requestData["arguments"][3]);    
    $SQL =  $SQL = "INSERT INTO lineman (FullName, Email,CNIC,PhoneNum,Ratings)
    VALUES ('$Name', '$Email', '$CNIC', '$PhoneNum','0')";

// Proceed with executing the SQL statement and handling any errors

    mysqli_query($conn, $SQL);  

    if (mysqli_error($conn)) {
        echo mysqli_error($conn);
    } else {
        echo 'Successful Submission of Lineman';
       // header("Location: http://localhost/electrix/Feedback.html");
        //echo "Registration is successful";
    }
 }
 else {
    echo 'Not Successful Submission of Linwman';
    //header("Location: http://localhost/electrix/Feedback.html");
 }
// $conn->close();
?>