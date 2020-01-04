<?php
include 'connectdb.php'; //connect the connection page
if(empty($_SESSION)) // if the session not yet started 
   session_start();


if(isset($_SESSION['user'])) { // if already login
   header("location: home.php"); // send to home page
   exit; 
}
?>

<!DOCTYPE html>
  <head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
  <title>Login</title>
  </head>

  <body>
    <div class="container" style="margin-top:70px; width:500px;">
      <form class="form-signin" role="form" action="start.php" method="post">
        <center><h2 class="form-signin-heading">Login to System</h2></center>
        
        <label for="inputUsername" class="sr-only">Username</label>
        <input class="form-control" placeholder="Username" name="username" required style="height:50px;" autofocus="on">
        
        <label for="inputPassword" class="sr-only">Password</label>
        <!--<input type="password" class="form-control" placeholder="Password" name="password" required style="height:50px;">-->
        <input type="password" class="form-control" placeholder="Password" name="password" required style="height:50px;" id="password" data-toggle="tooltip" data-trigger="manual" data-title="Caps lock is on">
        <br>
        
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Masuk</button>
      </form>

    </div> <!-- /container -->
    <script>
      $('[type=password]').keypress(function(e) {
        var $password = $(this),
            tooltipVisible = $('.tooltip').is(':visible'),
            s = String.fromCharCode(e.which);
        
        //Check if capslock is on. No easy way to test for this
        //Tests if letter is upper case and the shift key is NOT pressed.
        if ( s.toUpperCase() === s && s.toLowerCase() !== s && !e.shiftKey ) {
          if (!tooltipVisible)
            $password.tooltip('show');
        } else {
          if (tooltipVisible)
            $password.tooltip('hide');
        }
        
        //Hide the tooltip when moving away from the password field
        $password.blur(function(e) {
          $password.tooltip('hide');
        });
      });
    </script>
  </body>
</html>
