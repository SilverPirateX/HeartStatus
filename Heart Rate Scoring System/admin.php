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
    <link rel="stylesheet" href="admin2.css" >
      </head>
  <body>
     <div class="header">
      <h2>Statistics Heart Scoring Rates</h2>
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
              <div class="test2"><font size="6" color="black" align="center">
                <p align="center">Welcome <strong><span style="color:green;"><?php echo $_SESSION['username']; ?></span></strong></p><br>
                  <br>
                  <form method="POST" action="admin.php"> 
                    <div align="center">
                  <label><b><font size="7">Enter Range Age for the required Statistics </font></b></label><br><br>
                  <input type="number" name="minv" class="halfin" placeholder="Starting Age">
                  <input type="number" name="maxv" class="halfin" placeholder="Ending Age"><br><br>
                  <button type="submit" class="btn" name="gresult">Get Results</button><br><br>
                </form>
                      <table>
                            <tr>
                              <td>Registred Users</td>
                              <td><?php echo $nresult; ?></td>
                            </tr>
                            <tr>
                              <td>Low Heart Rate Scores</td>
                              <td><?php echo $lnresult; ?></td>
                            </tr>
                            <tr>
                              <td>Normal Heart Rate Scores</td>
                              <td><?php echo $nnnresult; ?></td>
                            </tr>
                            <tr>
                              <td>High Heart Rate Scores</td>
                              <td><?php echo $hnresult; ?></td>
                            </tr>
                      </table>
                      <?php 
                          echo'<font size="4" color="black" >The table results on the range of age from ' . $minv . ' to ' . $maxv . ' .</font>'; 
                      ?>

                    </div>
               
                <br>
                 <p><button class="btn"><a href="index.php?logout='1'">Logout</a></button></p>
              </p></font>
            </div>
            </div>
    </div>

    </div>

    
</body>
</html>