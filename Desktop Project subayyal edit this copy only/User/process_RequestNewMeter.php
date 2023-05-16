<?php
error_reporting(E_ALL);
define("host", "localhost");
define("username", "root");
define("password", "");
define("dbname", "electrix");

$conn = mysqli_connect(host, username, password, dbname);
mysqli_commit($conn);

error_reporting(E_ALL);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        parse_str(file_get_contents("php://input"), $requestData);

        if (isset($requestData["functionname"]) && $requestData["functionname"] === "RequestNewMeter") {
            $Name = isset($requestData["arguments"][0]) ? $requestData["arguments"][0] : "";
            $Email = isset($requestData["arguments"][1]) ? $requestData["arguments"][1] : "";
            $CNIC = isset($requestData["arguments"][2]) ? $requestData["arguments"][2] : "";
            $PhoneNum = isset($requestData["arguments"][3]) ? $requestData["arguments"][3] : "";
            $Address = isset($requestData["arguments"][4]) ? $requestData["arguments"][4] : "";

    //         echo "Name: " . $Name . "<br>";
    // echo "Email: " . $Email . "<br>";
    // echo "CNIC: " . $CNIC . "<br>";
    // echo "PhoneNum: " . $PhoneNum . "<br>";
    // echo "Address: " . $Address . "<br>";



            if (!empty($Name) && !empty($Email) && !empty($Address)) {
                // Email Validation

                if ( ! filter_var($Email, FILTER_VALIDATE_EMAIL)) {
                    die("Valid email is required");
                }
                try {
                    $SQL = "INSERT INTO RequestMeter(req_name, req_email,req_cnic,req_phonenum,req_address) VALUES ('$Name', '$Email', '$CNIC', '$PhoneNum', '$Address')";
                    mysqli_query($conn, $SQL);      
                    if(mysqli_error($conn)){
                        echo mysqli_error($conn);
                    }
                    else {
                        echo"Request Submitted";
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
?>