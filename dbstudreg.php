<html>
<body bgcolor="#E6E6FA">
<?php
include("auth.php");
define('DB_HOST', 'localhost');
define('DB_NAME', 'register');
define('DB_USER','root');
define('DB_PASSWORD','');

$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Failed to connect to MySQL: " . mysqli_error($con));
$uidinsert = $_SESSION['uid'];
$First_Name=$_POST['First_Name'];
$Last_Name=$_POST['Last_Name'];
$Birthday_day=$_POST['Birthday_day'];
$Birthday_Month=$_POST['Birthday_Month'];
$Birthday_Year=$_POST['Birthday_Year'];
$Email_Id=$_POST['Email_Id'];
$Mobile_Number=$_POST['Mobile_Number'];
$Gender=$_POST['Gender'];
$Address=$_POST['Address'];
$City=$_POST['City'];
$Pin_Code=$_POST['Pin_Code'];
$State=$_POST['State'];
$Country=$_POST['Country'];
$Hobby=$_POST['Hobby'];
        $query = "INSERT INTO student_registration (UID,first_name,last_name,birthday_day,birthday_month,birthday_year,email_id,mobile_number,Gender,address,city,pin_code,state,country,Hobby) VALUES ('$uidinsert','$First_Name', '$Last_Name', '$Birthday_day', '$Birthday_Month', '$Birthday_Year', '$Email_Id', '$Mobile_Number', '$Gender', '$Address','$City', '$Pin_Code', '$State', '$Country', '$Hobby')";

	$data = mysqli_query ($con,$query)or die(mysqli_error($con));
	if($data)
	{
	require('marks.html');
	}

?>
</body>
</html>