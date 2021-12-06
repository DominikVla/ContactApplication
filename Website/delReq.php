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
  #DeleteUser {
    background-color: red;
    border-color: red;
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
<div class="container" style="margin: auto;">
  <div class="row">
    <div class="col-sm-4">
      <form>
        <div class="form-row">
          <form name='form1' id='form1' method="get" formaction='deleteUser.php'>
          <div class="form-group col-md-6">
            <label for="inputfname4" style="text-align: center;">Enter ID of User to Delete</label>
            <input type="fname" class="form-control" id="inputfname4" placeholder="ID" name="contactid">
            <input type="submit" class="btn btn-primary" id="DeleteUser" style="margin: 7px; transform: translate(70%, 20%);" formaction="deleteUser.php" value="Delete User!"></input>
          </div>
        </form>
      </div>
    </form>
  </div>
</div>
</div>
<div class="footer" style="margin-bottom:0">
  <p>Copyright &copy;Dom 2021</p>
</div>
</body>