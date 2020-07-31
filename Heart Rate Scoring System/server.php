<?php
{
	//error_reporting (E_ALL ^ E_NOTICE);
	session_start();
	$username="";
	$email="";
	$day="";
	$month="";
	$year="";
	$lastcheck="";
	$rate="";
	$old="";
	$nresult="";
	$lnresult="0";
	$hnresult="0";
	$nnnresult="0";
	$errors=array();
	$db = mysqli_connect('localhost','root','','registration');
	if(isset($_POST['register']))
	{
		$username = mysqli_real_escape_string($db,$_POST['username']);
		$email = mysqli_real_escape_string($db,$_POST['email']);
		$password_1 = mysqli_real_escape_string($db,$_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db,$_POST['password_2']);
		$day = mysqli_real_escape_string($db,$_POST['day']);
		$month = mysqli_real_escape_string($db,$_POST['month']);
		$year = mysqli_real_escape_string($db,$_POST['year']);

		if(empty($username))
		{
			array_push($errors,"User name is required");
		}
		if(empty($email))
		{
			array_push($errors,"Email is required");
		}
		if(empty($password_1))
		{
			array_push($errors,"Password is required");
		}
		if(empty($day))
		{
			array_push($errors,"day of birth required");
		}
		if(empty($month))
		{
			array_push($errors,"month of birth is required");
		}
		if(empty($year))
		{
			array_push($errors,"year of birth is required");
		}
		if($password_1 != $password_2)
		{
			array_push($errors,"The password don't match ");
		}

		if (count($errors) == 0)
		{
			$old = 2020 - $year;
			$password=md5($password_1);
			$sql = "INSERT INTO users (username,email,password,day,month,year,old) values ('$username','$email','$password',$day,$month,$year,$old)";
			mysqli_query($db,$sql);
			$_SESSION['username'] = $username;
			$_SESSION['success'] = "you are logged in successfully";
			header('location: index.php'); //redirect to home page

		}
	}
		//log user in from login page
		if(isset($_POST['login']))
		{
			$username = mysqli_real_escape_string($db,$_POST['username']);
			$password = mysqli_real_escape_string($db,$_POST['password']);

			if(empty($username))
			{
				array_push($errors,"User name is required");
			}
			if(empty($password))
			{
				array_push($errors,"password is required");
			}
			if(count($errors) == 0){
				$password = md5($password);
				$query ="SELECT * FROM users WHERE username='$username' AND password='$password'";
				$result = mysqli_query($db, $query);
				if (mysqli_num_rows($result) == 1)
				{
					//log user in
					if($username =="admin")
					{
						$_SESSION['username'] = $username;
						$_SESSION['success'] = "you are logged in successfully";
						header('location: admin.php');
					}else{
					$_SESSION['username'] = $username;
					$_SESSION['success'] = "you are logged in successfully";
				header('location: index.php'); //redirect to home page
						}
				}else{
					array_push($errors,"The username or password u entered is wrong ");
					 }
			}
		}

	
	//logout
		if (isset($_GET['logout']))
		{
			session_destroy();
			unset($_SESSION['username']);
			header('location: heart.html');
		}
                    $minv="";
                    $maxv="";
                    if(isset($_POST['gresult']))
                    {
                    	$db = mysqli_connect('localhost','root','','registration');
                      $minv = mysqli_real_escape_string($db,$_POST['minv']);
                      $maxv = mysqli_real_escape_string($db,$_POST['maxv']);
                       $userquery ="SELECT username FROM users WHERE old >='$minv' and old<='$maxv'";
                      $result = mysqli_query($db, $userquery);
                      $nresult = mysqli_num_rows($result);
                      $highquery ="SELECT username FROM users WHERE old >='$minv' and old<='$maxv' and rate='high'";
                       $hresult = mysqli_query($db, $highquery);
                      $hnresult = mysqli_num_rows($hresult);
                      $normalquery ="SELECT username FROM users WHERE old >='$minv' and old<='$maxv' and rate='normal'";
                       $nnresult = mysqli_query($db, $normalquery);
                      $nnnresult = mysqli_num_rows($nnresult);
                      $lowquery ="SELECT username FROM users WHERE old >='$minv' and old<='$maxv' and rate='low'";
                       $lresult = mysqli_query($db, $lowquery);
                      $lnresult = mysqli_num_rows($lresult);
                      
                    }
}

?>