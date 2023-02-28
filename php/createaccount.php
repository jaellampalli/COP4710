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

    // Validate input fields
    $User_Id = mysqli_real_escape_string($conn, $_POST['User_Id']);
    $Email = mysqli_real_escape_string($conn, $_POST['Email']);
    $Password = mysqli_real_escape_string($conn, $_POST['Password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
    $Phone = mysqli_real_escape_string($conn, $_POST['Phone']);
    $FName = mysqli_real_escape_string($conn, $_POST['FName']);
    $LName = mysqli_real_escape_string($conn, $_POST['LName']);

    // Check if credentials already exist
    $sql = "SELECT * FROM Personal_Info WHERE User_Id='$User_Id' OR Email='$Email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $error = "UserId or Email already exists.";
    } else {
        // Insert data into database
        $sql = "INSERT INTO Personal_Info (User_Id, Password, FName, LName, Phone, Email) VALUES ('$User_Id', '$Password', '$FName', '$LName', '$Phone', '$Email')";
        if (mysqli_query($conn, $sql)) {
            // Account created successfully, redirect to login page
            header('Location: login.php');
            exit;
        } else {
            $error = "Error creating account.";
        }
    }

    // Checking for superadmin, admin, student
    if ($_POST[Student_type] == "Student") {
      $sql = "INSERT INTO Students (User_Id, Password) VALUES ('$User_Id', '$Password')"
      if (mysqli_query($conn, $sql)) {
          // Account created successfully, redirect to login page
          header('Location: login.php');
          exit;
      } else {
          $error = "Error creating account.";
      }
    }

    if ($_POST[Student_type] == "Admin") {
      $sql = "INSERT INTO Admin (User_Id, Password) VALUES ('$User_Id', '$Password')"
      if (mysqli_query($conn, $sql)) {
          // Account created successfully, redirect to login page
          header('Location: login.php');
          exit;
      } else {
          $error = "Error creating account.";
      }
    }

    if ($_POST[Student_type] == "Super admin") {
      $sql = "INSERT INTO SuperAdmin (User_Id, Password) VALUES ('$User_Id', '$Password')"
      if (mysqli_query($conn, $sql)) {
          // Account created successfully, redirect to login page
          header('Location: login.php');
          exit;
      } else {
          $error = "Error creating account.";
      }
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

// function to return an error message
function returnWithError( $err )
{
  $retValue = '{"User_Id":"","Password":"","error":"' . $err . '"}';
  sendResultInfoAsJson( $retValue );
}

// function to return user information
function returnWithInfo( $firstName, $lastName, $id )
{
  $retValue = '{"User_Id":' . $User_Id . ',Password":"' . $Password . '","error":""}';
  sendResultInfoAsJson( $retValue );
}


?>
