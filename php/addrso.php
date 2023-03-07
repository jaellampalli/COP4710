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
    $User_Id = mysqli_real_escape_string($conn, $_POST['User_Id']);
    $Rso_Id = mysqli_real_escape_string($conn, $_POST['Rso_Id']);
    $Name = mysqli_real_escape_string($conn, $_POST['Name']);
    

    $sql = "SELECT * FROM RSO_Group WHERE Rso_Id='$Rso_Id' AND User_Id='$User_Id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $error = "Rso group already exists.";
    } else if(mysqli_num_rows($result) < 0){
        // Insert data into database
        $sql = "INSERT INTO RSO_Group (Uid, User_Id, Rso_Id, Name) VALUES ('$Uid', '$User_Id', '$Rso_Id', '$Name')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
                 // Account created successfully, redirect to university page
                 header('Location: rso.html');
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