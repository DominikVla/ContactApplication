<?php
// Start the session
session_start();
if ($_SESSION["status"] != "loggedIn") {
  $_SESSION['login_error_msg'] = "You must sign on before you can view contacts.";
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Saltaire Sports Management</title>
  <link rel="icon" type="image/png" href="https://findicons.com/files/icons/2208/ball/128/classic.png">
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
  .form-row {
    background: rgba(115, 147, 179, 0.6);
    transform: translate(10%);
    width: 900px;
    padding: 10px;
    border-color: green;
    margin: 10px;
  }
  #inputstate {
    margin: auto;
    padding: 10px;
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
  #editUser {
    background-color: darkgrey;
    border-color: darkgrey;
    padding: 5px;
    margin: 5px;
  }
  body {
    background-image: url("images/adduser.jpg");
    background-repeat: no-repeat, repeat;
    background-color: #cccccc;
    background-size: 100% 1200px;
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
<?php
  $rowID = $_GET['contactid'];
  $conn = getDBConnection();        // get connection to database
  $row = getContactData($conn, $rowID);    // get contact detail for specified row


//
// This function reads contact data from the database and calls buildTableEntry
//
function getContactData($conn, $rowID) {
  $sql = "SELECT contactid, firstname, lastname, email, membership, phone FROM contacts";
  $sql = $sql . " where contactid = " . $rowID . ";";
  $result = mysqli_query($conn, $sql);      // access database
  $row = array();                           // empty array
 
  if (mysqli_num_rows($result) == 1) {       // if 1 row returned, get info
    $row = mysqli_fetch_assoc($result);   // build table row for each returned row
  } else {
    echo "0 results";
  }
   return $row;
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

?>
<body>
<form>
  <div class="form-row">
    <form name='form1' id='form1' method="get" ormaction='userlist.html'>
    <div class="form-group col-md-6">
      <label for="inputfname4">First Name</label>
      <input type="fname" class="form-control" id="inputfname4" value="<?php echo $row["firstname"];?>" name="firstname">
    </div>
    <div class="form-group col-md-6">
      <label for="inputlname4">Last Name</label>
      <input type="lname" class="form-control" id="inputlname4" value="<?php echo $row["lastname"];?>" name="lastname">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" value="<?php echo $row["email"];?>" name="email">
    </div>
    <div class="form-group col-md-6" style="margin: auto";>
      <label for="inputPhone4">Phone Number</label>
      <input type="phone" class="form-control" id="inputPhone4" value="<?php echo $row["phone"];?>" name="phone">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4" style="margin: auto; ">
      <label for="inputState">Membership Type</label>
      <select id="inputState" class="form-control" name="membership">
        <option selected><?php echo $row["membership"];?></option>
        <option>Casual</option>
        <option>Fitness</option>
        <option>Dedicated</option>
      </select>
      <input type="hidden" id="custId" name="clientid" value="<?php echo $row["contactid"];?>">
      <input type="submit" class="btn btn-primary" style="margin: 7px; transform: translate(70%, 20%);" formaction="UpdateUser.php" value="Confirm Edit"></input>
    </div>
  </form>
  </div>
  <div class="form-group">
  </div>
</form>
</div>
<div class="footer" style="margin-bottom:0">
  <p>Copyright &copy;Dom 2021</p>
</div>
</body>
</html>