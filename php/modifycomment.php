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
    $Comment = mysqli_real_escape_string($conn, $_POST['Comment']);
    $Rating = mysqli_real_escape_string($conn, $_POST['Rating']);



    $sql = "SELECT * FROM Comments WHERE Event_Id='$Event_Id' OR User_Id='$User_Id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $error = "Comment already exists.";
    } else if(mysqli_num_rows($result) < 0){
        // Insert data into database
        $sql = "UPDATE Comments SET Comments.Comment = '$Comment', Comments.Rating = '$Rating'
                WHERE $User_Id = Comments.User_Id AND $Event_Id = Comments.Event_Id";
        $result = mysqli_query($conn, $sql);
        if ($result) {
                 // Modified the comment successfully
                 header('Location: comments.html');
               }
               else {
                 // Displays error message.
                 echo "Error: " . $sql . "<br>" . mysqli_error($conn);
               }
            exit;
        }
        else {
            $error = "Error modifying comment.";
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
