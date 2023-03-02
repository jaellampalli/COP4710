<?php
// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Connect to the database
    $servername = "localhost";
    $username = "databaseproject";
    $password = "uCf12345678@";
    $dbname = "COP4710";
    $conn = mysqli_connect("localhost", "databaseproject", "uCf12345678@", "COP4710");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $Uid = mysqli_real_escape_string($conn, $_POST['Uid']);
    $UniName = mysqli_real_escape_string($conn, $_POST['UniName']);
    $Student_Count = mysqli_real_escape_string($conn, $_POST['Student_Count']);
    $Location_Name = mysqli_real_escape_string($conn, $_POST['Location_Name']);
    $Latitude = mysqli_real_escape_string($conn, $_POST['Latitude']);
    $Longitude = mysqli_real_escape_string($conn, $_POST['Longitude']);


    $sql = "SELECT * FROM University WHERE Uid='$Uid' OR UniName='$UniName'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $error = "University already exists.";
    } else {
        // Insert data into database
        $sql = "INSERT INTO University (Uid, UniName, Student_Count, Location_Name,) VALUES ('$Uid', '$UniName', '$Student_Count', '$Location_Name')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
                 // Account created successfully, redirect to university page
                 header('Location: adduniversity.php');
               }
               else {
                 // Displays error message.
                 echo "Error: " . $sql . "<br>" . mysqli_error($conn);
               }
            exit;
        }
        else {
            $error = "Error creating account.";
        }
    $x = array(SELECT * From University);
    


    // Close connection
    mysqli_close($conn);
    }

    // Function to retrieve the request payload data
    function getRequestInfo()
    {
      return json_decode(file_get_contents('php://input'), true);
    }

    // function to send the result info as a JSON response
    function sendResultInfoAsJson( $obj )
    {
      header('Content-type: application/json');
      echo $obj;
    }

    ?>
