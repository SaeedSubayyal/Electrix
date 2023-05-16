<?php
error_reporting(E_ALL);
define("host", "localhost");
define("username", "root");
define("password", "");
define("dbname", "electrix");

$conn = mysqli_connect(host, username, password, dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
mysqli_commit($conn);

error_reporting(E_ALL);


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        parse_str(file_get_contents("php://input"), $requestData);
            $Name = $requestData["Name"];
            $Email = $requestData["Email"];
            $PhoneNum = $requestData["PhoneNum"];
            $CNIC = $requestData["CNIC"];
            $Password =$requestData["Password"];

            // die("Works");
            if (!empty($Name)){
              $SQL = "UPDATE user_electrix
                 SET Name = '$Name'
                WHERE CNIC = '$CNIC'";
                mysqli_query($conn, $SQL);  
                if (mysqli_query($conn, $SQL)) {
                    // Query executed successfully
                    echo "Update successful!";
                } else {
                    // Error occurred during query execution
                    echo "Update failed: " . mysqli_error($conn);
                }
            }
            if (!empty($Email)){
                if ( ! filter_var($Email, FILTER_VALIDATE_EMAIL)) {
                    die("Valid email is required");
                }
                $SQL = "UPDATE user_electrix
                 SET Email = '$Email'
                WHERE CNIC = '$CNIC'";
                mysqli_query($conn, $SQL);  
            }
            if (!empty($PhoneNum)){
                $SQL = "UPDATE user_electrix
                SET PhoneNum = '$PhoneNum'
               WHERE CNIC = '$CNIC'";
               mysqli_query($conn, $SQL);
            }
        }
?>