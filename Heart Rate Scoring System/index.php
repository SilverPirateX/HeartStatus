<?php include('server.php'); 
  // if user not logged in, they cannot access this page
 /* if(empty($SESSION['username']))
  {
  header('location: login.php');
  }*/
?> 

<!Doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="Heart Score Rate" content="Do you want to know your heart rate score !!?">
    <title>Heart Rate Score</title>
    <link rel="stylesheet" href="index2.css" >
      </head>
  <body>
    <div class="header">
      <h2>Heart Rate Scoring</h2>
    </div>
      <div class="content">

       
        </div>
            <div class="heartcalc">
               <?php if (isset($_SESSION['success'])): ?>
        <div class="success">
          <h3>
              <?php 
                echo $_SESSION['success'];
                unset($_SESSION['success']);

              ?>
          </h3>
            </div>
     
            <?php endif ?> 
              <div class="test2"><font color="black">
                <p align="center">Welcome <strong><span style="color:green;"><?php echo $_SESSION['username']; ?></span></strong></p><br>
               
                 <p> According to AHA "<span class="text3">American Heart Associan</span>"<br><br>
                <?php 
                //Heart Rate Calculator
                $username=$_SESSION['username'];
                $oldquery ="SELECT old FROM users WHERE username='$username'";
                $result = mysqli_query($db, $oldquery);
                while ($row = $result->fetch_assoc()) {
                    $userold = $row['old']."<br>";
                }
                $oldy = (int)$userold;
                echo 'Your <span class="text3">Max</span> Heart Rate :<span class="text4"> '. (220 - $oldy) . "</span> Beat/Minute<br>";
                echo 'Your <span class="text3">Target</span> Heart Rate : <span class="text4"> ' . ((50/100)*(220 - $oldy)) . " - " . ((85/100)*(220 - $oldy)) . "</span> Beat/Minute<br><br>";
                ?><br>
                <form method="post" action="index.php">
                 <label>Enter your last recorded heart rate to check it :</label> &nbsp;&nbsp;&nbsp;
                  <input type="number" name="lastcheck" class="halfin" id="lastcheck">
                   <button name="check1" class="btnin" type="submit">Check</button>
                 </form><br>
                   <?php
                        echo '<p id="show" class="checkv">';
                        $inputvalue="";
                        $rater="undefined";
                        if(isset($_POST['check1']))
                              {
                                $db = mysqli_connect('localhost','root','','registration');
                                $inputvalue = mysqli_real_escape_string($db,$_POST['lastcheck']);
                              
                             if($inputvalue < ((50/100)*(220 - $oldy)))
                              {
                                  $rater="low";
                              }
                              else if($inputvalue > ((85/100)*(220 - $oldy)))
                              {
                                  $rater="high";
                              }
                              else
                              {
                                  $rater="normal";
                              }
                              $sql = "UPDATE users SET lastcheck = '$inputvalue' WHERE username='$username'";
                                     mysqli_query($db,$sql);
                              $sql = "UPDATE users SET rate = '$rater' WHERE username='$username'";
                                     mysqli_query($db,$sql);
                            }

                        echo ' your heart score is  ' . $rater . '</p>';
                        echo '<font size="4">The result shown is according to last input you have been checked.</font><br>';

                    ?>
                  <br>
                     
                 <p><button class="btn"><a href="index.php?logout='1'">Logout</a></button></p>
              </p></font>
            </div>
            </div>
    </div>
</body>
</html>