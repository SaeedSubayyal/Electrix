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
//error_reporting(E_ALL);
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        parse_str(file_get_contents("php://input"), $requestData);
        var_dump($requestData);
        $Name = ($requestData["arguments"][0]);
        $Email = ($requestData["arguments"][1]);
        $PhoneNum = ($requestData["arguments"][2]);
        $CNIC = ($requestData["arguments"][3]);
        var_dump($Name);
        var_dump($Email);
        var_dump($PhoneNum);
        var_dump($CNIC);
            if (!empty($Name) && !empty($CNIC) && !empty($PhoneNum) && !($Email) ){
                echo("Hello");
              $SQL = "INSERT INTO lineman (FullName, Email,CNIC,PhoneNum,Ratings)
             VALUES ('$Name', '$Email', '$CNIC', '$PhoneNum','0')";
              
                mysqli_query($conn, $SQL);  
                if (mysqli_query($conn, $SQL)) {
                    // Query executed successfully
                    echo "Update successful!";
                } else {
                    // Error occurred during query execution
                    echo "Update failed: " . mysqli_error($conn);
                }
            }
        }    
?>