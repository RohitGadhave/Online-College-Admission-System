<?php
include("db.php");
include("auth.php");
?>
<html>
<body bgcolor="#E6E6FA">
<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'register');
define('DB_USER','root');
define('DB_PASSWORD','');

$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Failed to connect to MySQL: " . mysqli_error($con));

$uidinsert = $_SESSION['uid'];
$COLLEG1=$_POST['college1'];
$COLLEG2=$_POST['college2'];
$COLLEG3=$_POST['college3'];

        $query = "INSERT INTO collegepref1 (UID,college1,college2,college3) VALUES ('$uidinsert', '$COLLEG1', '$COLLEG2',  '$COLLEG3')";

	$data = mysqli_query ($con,$query)or die(mysqli_error($con));
	if($data)
	{
	header("Location:index1.php");
	}
	else{
		echo "Failed To Fill";
	}

?>
</body>
</html>