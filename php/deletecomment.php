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

    $User_Id = mysqli_real_escape_string($conn, $_POST['User_id']);
    $Event_Id = mysqli_real_escape_string($conn, $_POST['Event_Id']);
    


    $sql = "DELETE * FROM Comments WHERE Event_Id='$Event_Id' AND User_Id='$User_Id'";
    $result = mysqli_query($conn, $sql);
    

    if ($result) {
        // Modified the comment successfully
        header('Location: comments.html');
      }
      
   exit;




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