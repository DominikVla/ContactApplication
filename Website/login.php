<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>

<?php
// Start the session
session_start();
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
  .container {
    margin: auto;
    width: 400px;
    padding: 10px;
  }
  .logintxt {
    text-align: center;
  }
  .loginArea {
    /*border: 10px solid #7393b3;
    background-color: #7393b3;*/
    background: rgba(115, 147, 179, 0.6);
    display: inline-block;
    width: 350px;
  }
  .formcontrol {
    width: 200px;
  }
  #Confirm {
    background-color: green;
    border: green;
  }
  #Cancel {
    background-color: red;
    border: red;
  }
  .signin {
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
  .alert {
    background: rgba(115, 147, 179, 0.6);
    display: inline-block;
    width: 350px;
    margin:  2px;
    padding: 5px;
  }
  body {
    background-image: url("images/golf.jpg");
    background-repeat: no-repeat, repeat;
    background-color: #cccccc;
    background-size: 100% 1250px;
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
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="userlist.php">User List</a>
      </li>    
    </ul>
  </div>  
</nav>

<div class="container" style="margin-top:30px">
  <div class="row">
    <div class="col-sm-4">

     <form name='form1' id='form1' method="post" class=loginArea action="verify.php">
          <h2 class="logintxt">Login</h2>
          <div class="form-group col-md-6">
            <p class="Username"> Email </p>
            <input type="uname" style="width:300px" class="form-control" id="uname" placeholder="Email" name="email">
          </div>
          <div class="form-group col-md-6">
            <label for="inputlname4">Password</label>
            <input type="password" style="width: 300px" class="form-control" id="pword" placeholder="Password" name="password">
          </div>
            <div class="signin">
            <button type="submit" class="btn btn-primary" id="Confirm">Login</button>
            <a type="nav-link" href="index.html" class="btn btn-primary" id="Cancel">Back to Home</a>
          </div>
     </form>
     <div class="alert">
     <?php
       // add error message if previous attempt failed
       if(!empty($_SESSION['login_error_msg']))
       {
           echo '<p class="text-danger">';
           echo $_SESSION['login_error_msg'];
           echo '</p>';
       }
     ?>
   </div>
     <p></p>
    </div>
  </div>
</div>

<div class="footer" style="margin-bottom:0">
  <p>Copyright &copy;Dom 2021</p>
</div>

</body>
</html>
