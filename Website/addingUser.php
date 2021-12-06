<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>
<?php
$servername = "localhost";
$username = "111117";
$password = "saltaire";
$dbname = "111117";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $firstname = $_GET['firstname'];
  $lastname = $_GET['lastname'];
  $email = $_GET['email'];
  $password = $_GET['password'];
  $membership = $_GET['membership'];
  $phone = $_GET['phone'];

$sql = "INSERT INTO contacts (firstname, lastname, email, password, membership, phone)
VALUES ('$firstname','$lastname','$email','$password','$membership','$phone')";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "New record created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
header('Location: UserList.php');
?>