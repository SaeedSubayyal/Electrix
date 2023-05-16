<?php
error_reporting(E_ALL);
define("host", "localhost");
define("username", "root");
define("password", "");
define("dbname", "electrix");

$conn = mysqli_connect(host, username, password, dbname);
mysqli_commit($conn);

if ($conn == false) {
    die("CANNOT CONNECT DUE TO: " . mysqli_connect_error());
} else {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        parse_str(file_get_contents("php://input"), $requestData);

        if (isset($requestData["functionname"]) && $requestData["functionname"] === "AdminSignUp") {
            $Name = isset($requestData["arguments"][0]) ? $requestData["arguments"][0] : "";
            $Email = isset($requestData["arguments"][1]) ? $requestData["arguments"][1] : "";
            $Password = isset($requestData["arguments"][2]) ? $requestData["arguments"][2] : "";
            $CNIC = isset($requestData["arguments"][3]) ? $requestData["arguments"][3] : "";
            $PhoneNum = isset($requestData["arguments"][4]) ? $requestData["arguments"][4] : "";
            $Address = isset($requestData["arguments"][5]) ? $requestData["arguments"][5] : "";
            if (!empty($Name) && !empty($Email) && !empty($Password)) {

                // Email Validation

                if ( ! filter_var($Email, FILTER_VALIDATE_EMAIL)) {
                    die("Valid email is required");
                }
                if (strlen($Password) < 8) {
                    die("Password must be at least 8 characters");
                }
                echo $CNIC;
                if ( ! preg_match("/[a-z]/i", $Password)) {
                    die("Password must contain at least one letter");
                }    
                if ( ! preg_match("/[0-9]/", $Password)) {
                    die("Password must contain at least one number");
                }
                
                $password_hash = password_hash($Password, PASSWORD_DEFAULT);
                try {
                    $SQL = "INSERT INTO lineman(FullName,Email,CNIC,PhoneNum,Ratings) VALUES ('$Name', '$Email', '$CNIC', '$PhoneNum', ' ')";
                    mysqli_query($conn, $SQL);      

                    if(mysqli_error($conn)){
                        echo mysqli_error($conn);
                    }
                    else {
                        echo"Registeration is successful";
                    }
                } catch (Exception $e) {
                    if ($e->getCode() == 1062) {
                        echo "A user with this username already exists";
                    }
                }
            } else {
                if (empty($_POST["name"])) {
                    die("Name is required");
                }
            }
        }
    }
}

?>