<?php include('server.php'); ?>
<!Doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="Heart Score Rate" content="Do you want to know your heart rate score !!?">
    <title>Heart Rate Score</title>
    <link rel="stylesheet" href="register.css" >
      </head>
  <body>
    <div class="header">
      <h2>Login</h2>
    </div>

    <form method="post" action="login.php">
      <?php include('errors.php'); ?>
      <div class="iputg">
          <label>Username</label>
          <input type="text" name="username" class="fullin">
      </div>
      <div class="iputg">
          <label>Password</label>
          <input type="password" name="password" class="fullin">
      </div>
      <div class="iputg">
          <button type="submit" name="login" class="btn">Login</button>
      </div>

      <p> Not a member? <a href="register.php">Register</a></p>
    </form>
      
    </div>


  </body>
</html> 