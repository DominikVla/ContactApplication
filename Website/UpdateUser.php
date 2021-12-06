<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>


<?php
  $contactid = $_GET['clientid'];
  $firstname = $_GET['firstname'];
  $lastname = $_GET['lastname'];
  $email = $_GET['email'];
  $membership = $_GET['membership'];
  $phone = $_GET['phone'];
?>



<!--
//Setting up a connection

$servername = "localhost";
$username = "111117";
$password = "saltaire";
$dbname = "111117";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
//name of column = $value
//WHERE : what to apply changes too ( in this case the ID)
$sql = "UPDATE contacts SET firstname='$firstname', lastname='$lastname', email='$email', membership='$membership', phone='$phone' WHERE contactid='$contactid'";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();

header("Location: UserList.php"); // redir to main page 
!-->




<?php
$servername = "localhost";
$username = "111117";
$password = "saltaire";
$dbname = "111117";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "UPDATE contacts SET firstname='$firstname', lastname='$lastname', email='$email', membership='$membership', phone='$phone' WHERE contactid='$contactid'";

  // Prepare statement
  $stmt = $conn->prepare($sql);

  // execute the query
  $stmt->execute();

  // echo a message to say the UPDATE succeeded
  echo $stmt->rowCount() . " records UPDATED successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
header("Location: UserList.php");
?> 