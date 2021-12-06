<?php
// Start the session
session_start();
if ($_SESSION["status"] != "loggedIn") {
  $_SESSION['login_error_msg'] = "You must sign on before you can view contacts.";
  header("Location: login.php");
}
?>
<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Saltaire Sports Management</title>
  <link rel="icon" type="image/png" href="https://findicons.com/files/icons/2208/ball/128/classic.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
  </style>
  <style>
  .col-sm-4 {
    right: -252px;
    padding: 10px;
  }
  .newUser {
    position: relative;
    margin: auto;
    width: 300px;
    padding: 5px;
  }
  .footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    text-align: center;
    background-color: darkgrey;
    height:  10%;
    opacity: 0.6
  }
  .top {
    /*background-color: slategrey;*/
    background-color:rgb(95, 95, 95);
    text-decoration-color: black;
    text-decoration;
  }
  #DeleteUser {
    background-color: red;
    border-color: red;
  }
  #edituser {
    background-color: green;
    border-color: green;
    margin: 5px;
  }
  .buttons {
    position: fixed;
    left: 100;
  }
  .table {
    background-color: rgba(0, 191, 255, 0.6);
  }
  body {
    background-image: url("images/userlist.jpg");
    background-repeat: no-repeat, repeat;
    background-color: #cccccc;
    background-size: 100% 1230px;
    background-position:center top;
  }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="index.html">Saltaire Sports</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.html">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="userlist.php">User List</a>
      </li>    
    </ul>
  </div>  
</nav>

<div class="container" style="text-align: center; ">
  <div class="row">
    <div class="col-sm-4">
      <form name='formList' id='formList' action="contactEdit.php" method="post">
      <table class="table">
        <thead class="thead-dark">
        </thead>
        <tbody>
          <?php
          $servername = "localhost";
          $username = "111117";
          $password = "saltaire";
          $dbname = "111117";

          // Create connection
          echo "<thead class='thead-dark'>";
          echo "<table class='table'>";
           echo "<tr class='top'><th scrope='col'>Id</th><th scrope='col'>name</th><th scrope='col'>L name</th><th scrope='col'>email</th><th scrope='col'>Membership</th><th scrope='col'>Phone</th></div></tr>"; // the titles
           echo "</thead>";

          class TableRows extends RecursiveIteratorIterator {
              function __construct($it) {
                  parent::__construct($it, self::LEAVES_ONLY);
              }

              function current() {
                  return "<td style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
              }

              function beginChildren() {
                  echo "<tr>";
              }

              function endChildren() {
                  echo "</tr>" . "\n";
              }
          }

          $servername = "localhost";
          $username = "111117";
          $password = "saltaire";
          $dbname = "111117";

          try {
              $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $stmt = $conn->prepare("SELECT contactid, firstname, lastname, email, membership, phone  FROM contacts;"); //SQL command 
              $stmt->execute();

              // set the resulting array to associative
              $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

              foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                  echo $v;
              }
          }
          catch(PDOException $e) {
              echo "Error: " . $e->getMessage();
          }
          $conn = null;
          echo "</table>";
          ?>
        </tbody>
      </table>
      <p></p>
      <div>
      <div class="buttons">
      <a type="nav-link" href="addUser.php" class="btn btn-primary">Add a New User</a>
      <a type="nav-link" href="delReq.php"class="btn btn-primary" id="DeleteUser">Delete User</a>
      <a type="nav-link" href="EditReq.php" class="btn btn-primary" id="edituser">Edit User</a>
    </div>
  </div>
  </form>
  </div>
</div>

<div class="footer" style="margin-bottom:0">
  <p>Copyright &copy;Dom 2021</p>
</div>

</body>
</html>
