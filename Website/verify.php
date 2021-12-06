<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>

<?php
// Start the session
session_start();

// Get parameters from login page
$email    = $_POST['email'];
$password = $_POST['password'];

// Try and login
$status = loginDB($email, $password);
if ($status == "loggedIn") {
	processGoodLogin($status);		// process good login
} else {
	processBadLogin($status);		// process bad login
}

//
// Test function to see if login works
//
function loginMock($email, $password) {
	$DEFAULT_EMAIL   = 'smullarkey@shipley.ac.uk';
	$DEFAULT_PASSWORD = 'mypassword';

	if (($email == $DEFAULT_EMAIL)  && ($password == $DEFAULT_PASSWORD)) {
		$status = "loggedIn";
	} else {
		$status = "loggedOut";
	}
	return $status;
}

//
// Test function to see if login works
//
function loginDB($email, $password) {
	$conn = getDBConnection();
	$status = checkCreds($conn, $email, $password);
	return $status;
}

//
// Get database connection
//
function getDBConnection() {
	// get connection to MySQL database
	$servername = "localhost";
	$username = "111117";
	$password = "saltaire";
	$dbname = "111117";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
	  die("Connection failed: " . mysqli_connect_error());
	}
	return $conn;
}

//
// check if credentials passed are in db
//
function checkCreds($conn, $email, $password) {
	$sql = "SELECT contactid FROM contacts";
	$sql = $sql . " where email='" . $email . "' AND password='" . $password . "';";
	$result = mysqli_query($conn, $sql);

	// if the query returns one result, email and password are OK
	if (mysqli_num_rows($result) == 1) {
		$status = "loggedIn";
	} else {
		$status = "loggedOut";
	}

	// Close the connection 
	mysqli_close($conn);
	return $status;	
}

//
// Process good login
//
function processGoodLogin($status) {
	$_SESSION["status"] = $status;
    $_SESSION['login_error_msg'] = "";
	header("Location: UserList.php");
	exit();	
}

//
// Process bad login
//
function processBadLogin($status) {
	$_SESSION["status"] = $status;
	$_SESSION['login_error_msg'] = "Sorry, that user name or password is incorrect. Please try again.";
	header("Location: login.php");
	exit();		
}

?>
