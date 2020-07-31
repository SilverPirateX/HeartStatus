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
      <h2>Register</h2>
    </div>

    <form method="post" action="register.php">
     <?php //display validation errors ?>
      <?php include('errors.php'); ?>
      <div class="iputg">
          <label>Username</label>
          <input type="text" name="username" class="fullin">
      </div>
      <div class="iputg">
          <label>Email</label>
          <input type="text" name="email" class="fullin">
      </div>
      <div class="iputg">
          <label>Password</label>
          <input type="password" name="password_1" class="fullin">
      </div>
      <div class="iputg">
          <label>Confirm Password</label>
          <input type="password" name="password_2" class="fullin">
      </div>
      <div class="iputg">
          <label>Birth Date</label><br>
          <input type="number" name="day" placeholder="Day" min="1" maxlength="2" max="31" class="halfin">
          <input type="number" name="month" placeholder="Month" min="1" maxlength="2" max="12" class="halfin">
          <input type="number" name="year" placeholder="Year" min="1900" maxlength="4" max="2020" class="halfin"><br>
      </div>
      <div class="iputg">
          <button type="submit" name="register" class="btn">Register</button>
      </div>

      <p> Already member? <a href="login.php">Sign in</a>
    </form>
      
    </div>


  </body>
</html>


