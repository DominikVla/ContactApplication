<?php
$servername = "localhost";
$username = "111117";
$password = "saltaire";
$dbname = "111117";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // sql to delete a record
  $contactid = $_GET['contactid'];
  $sql = "DELETE FROM contacts WHERE contactid = " . $contactid;

  // use exec() because no results are returned
  $conn->exec($sql);
  echo "Record deleted successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
header('Location: UserList.php');
?>