<?php
	// Retrieve the request payload data
	$request_data = getRequestInfo();

	// Connect to the MySQL database
	$servername = "localhost";
	$username = "databaseproject";
	$password = "uCf12345678@";
	$dbname = "COP4710";

	$conn = new mysqli("localhost", "databaseproject", "uCf12345678@", "COP4710");

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	// Retrieve the userid and password from the request data
	$username = $request_data['User_Id'];
	$password = $request_data['Password'];

	//  to check if the userid exists
	$sql = "SELECT User_Id, Password FROM Students WHERE User_Id='$User_Id' AND Password='$Password'";
	$result = $conn->query($sql);

	if ($result->num_rows == 1) {
		echo "success";
	} else {
		echo "error";
	}

	else {
		$sql = "SELECT User_Id, Password FROM SuperAdmin WHERE User_Id='$User_Id' AND Password='$Password'";
		$result = $conn->query($sql);

		if ($result->num_rows == 1) {
			echo "success";
		} else {
			echo "error";
		}
	}

	else {
			$sql = "SELECT User_Id, Password FROM Admin WHERE User_Id='$User_Id' AND Password='$Password'";
			$result = $conn->query($sql);

			if ($result->num_rows == 1) {
				echo "success";
			} else {
				echo "error";
			}
	}
	$conn->close();

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
	function returnWithInfo( $User_Id, $Password)
	{
		$retValue = '{"User_Id":' . $User_Id . ',Password":"' . $Password . '","error":""}';
		sendResultInfoAsJson( $retValue );
	}
?>
