<?php
session_start();
require ('connect.php');

if (isset($_POST['submit_form'])) {

//        var_dump($sql);

    $first_name     = $_POST['first_name'];
    $last_name     = $_POST['last_name'];
    $email   = $_POST['email'];
    $phone    = $_POST['phone'];
    $password  = $_POST['password'];
    $user_name  = $_POST['user_name'];
    $dob     = $_POST['dob'];
    $address     = $_POST['address'];
    $state     = $_POST['state'];

//    PREVENTION FROM SQL INJECTION
    $password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
    $hash = $mysqli->escape_string(md5(rand(0, 1000)));

//  TO HASH THE PASSWORD CODE GOES HERE
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email'");
    $num_rows = mysqli_num_rows($result);

    if ($result->num_rows > 0) {

        echo "User with this email already exists!";

    } else {

      // else proceed with the registration
      $sql = "INSERT INTO users(first_name, last_name, email, phone, password, user_name, dob, address, state) VALUES ('$first_name', '$last_name', '$email', '$phone', '$password', '$user_name', '$dob', '$address', '$state')";

      $Result = $mysqli->query($sql);

      if ($Result) {

        $_SESSION['logged_in'] = true;
        echo "  Hello  $user_name, Thank you for signing up!";

      }else {

          echo "Registration failed, please try again.";

      }

    }

  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Contact Us | PINK Project</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

  </head>


  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Graft Pink</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="#">Home<span class="sr-only">(current)</span></a></li>
            <li><a href="./">About</a></li>
            <li><a href="../navbar-fixed-top/">Services</a></li>
             <li><a href="../navbar-fixed-top/">Contact</a></li>
             <li><a href="../navbar-fixed-top/" class=" btn btn-danger"> <i class="glyphicon glyphicon-user"></i>Log In</a></li>
          </ul>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron text-center">
      <div class="container">
        <h1>Contact Us</h1>
        <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Leave a message &raquo;</a></p>
      </div>
    </div>

    <div class="container">


      <h3>Registration Form</h3>
      <p>Kindly fill the form below to reach you</p>
      <hr class="pink hr">

      <form class="" method="POST" enctype="" action="">
        
        <div class="form-group">
          <label>First Name</label>
          <input type="text" class="form-control" name="first_name" required="required">
        </div>

        <div class="form-group">
          <label>Last Name</label>
          <input type="text" class="form-control" name="last_name" required="required">
        </div>

        <div class="form-group">
          <label>Email Address</label>
          <input type="email" class="form-control" name="email" required="required">
        </div>

        <div class="form-group">
          <label>Phone Number</label>
          <input type="tel" class="form-control" name="phone" required="required">
        </div>

        <div class="form-group">
          <label>Password</label>
          <input type="password" class="form-control" name="password" required="required">
        </div>

        <div class="form-group">
          <label>User Name</label>
          <input type="text" class="form-control" name="user_name" required="required">
        </div>

        <div class="form-group">
          <label>Date Of Birth</label>
          <input type="date" class="form-control" name="dob" required="required">
        </div>

        <div class="form-group">
          <label>Address</label>
          <textarea class="form-control" name="address" placeholder="Please Enter Your Address here"></textarea>
        </div>

        <div class="form-group">
          <label>State Of Origin</label>
          <input type="text" class="form-control" name="state" required="required">
        </div>

        <button class="btn btn-success btn-block" name="submit_form">Submit</button>

      </form>

    </div>

    <footer>
      <p>&copy; 2016 Company, Inc.</p>
    </footer>




    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>