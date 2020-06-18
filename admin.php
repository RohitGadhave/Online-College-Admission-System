
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body bgcolor="#E6E6FA">
<?php
    include('db.php');
	session_start();
    if (isset($_POST['username'])){
		
		$username = stripslashes($_REQUEST['username']);
		$username = mysqli_real_escape_string($con,$username);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		
        $query = "SELECT * FROM `users` WHERE username='$username' and password='".md5($password)."'";
		$result = mysqli_query($con,$query) or die(mysqli_error());
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$_SESSION['username'] = $username;
			$sql = "SELECT * FROM users WHERE username='$username' and password='".md5($password)."'";
			$rtv = mysqli_query($con,$sql) or die(mysqli_error($con));
			$row = mysqli_fetch_assoc($rtv);
			$_SESSION['uid'] = $row['UID'];
			
			;;
			if(	$_SESSION['username'] == 'admin'){header("Location: index2.php");}
			else{header("Location: notaadmin.php");}
			;;

            }else{
				echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
				}
    }else{
?>
<div style="text-align: center;">
<h1>Log In</h1>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="Username" required /><br>
<input type="password" name="password" placeholder="Password" required /><br>
<input name="submit" type="submit" value="Login" />
</form>
</div>
<?php } ?>


</body>
</html>
