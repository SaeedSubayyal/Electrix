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
        if (isset($_POST["functionname"]) && $_POST["functionname"] === "UpdateSettingAdmin") {
            $Name = isset($_POST["arguments"][0]) ? $_POST["arguments"][0] : "";
            $Email = isset($_POST["arguments"][1]) ? $_POST["arguments"][1] : "";
            $PhoneNum = isset($_POST["arguments"][2]) ? $_POST["arguments"][2] : "";
            $CNIC = isset($_POST["arguments"][3]) ? $_POST["arguments"][3] : "";
            // die("Works");
            if (!empty($Name)){
              $SQL = "UPDATE admin
                 SET admin_name = '$Name'
                WHERE admin_cnic = '$CNIC'";
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
                $SQL = "UPDATE admin
                 SET admin_email = '$Email'
                WHERE admin_cnic = '$CNIC'";
                mysqli_query($conn, $SQL);  
            }
            if (!empty($PhoneNum)){
                $SQL = "UPDATE admin
                SET admin_phonenum = '$PhoneNum'
               WHERE admin_cnic = '$CNIC'";
               mysqli_query($conn, $SQL);
            }
        }
    }    
?>