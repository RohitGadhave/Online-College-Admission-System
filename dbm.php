<?php
include("db.php");
include("auth.php");
define('DB_HOST', 'localhost');
define('DB_NAME', 'register');
define('DB_USER','root');
define('DB_PASSWORD','');

$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Failed to connect to MySQL: " . mysqli_error($con));
$uidinsert = $_SESSION['uid'];
$Name=$_POST['name'];
$SSC_MARKS=$_POST['ssc_marks'];
$OUTOFF_SSC=$_POST['outoff_ssc'];
$SSC_PERCENTAGE=$_POST['ssc_percentage'];
$HSC_MARKS=$_POST['HSCMARKS'];
$OUTOFF_HSC=$_POST['OUTOFF_HSC'];
$HSC_PERCENTAGE=$_POST['HSCPERCENTAGE'];
$PHSIYCS=$_POST['PHYSICS'];
$OUTOFF_PHYSIYCS=$_POST['OUTOFFp'];
$CHEMISTRY=$_POST['CHEMISTRY'];
$OUTOFF_CHEMISTRY=$_POST['OUTOFFc'];
$MATHS=$_POST['MATHS'];
$OUTOFF_MATH=$_POST['OUTOFFm'];
$PCM_AGGREGATE=$_POST['PCMAGGREGATE'];
$OUTOFF_PCM_AGGREGATE=$_POST['OUTOFFarg'];
$CET=$_POST['CET'];
$JEE=$_POST['JEE'];
         $query = "INSERT INTO marks (UID,Name,SSC_MARKS,OUTOFF_SSC,SSC_PERCENTAGE,HSC_MARKS,OUTOFF_HSC,HSC_PERCENTAGE,PHSIYCS,OUTOFF_PHYSIYCS,CHEMISTRY,OUTOFF_CHEMISTRY,MATHS,OUTOFF_MATH,PCM_AGGREGATE,OUTOFF_PCM_AGGREGATE,CET,JEE)
VALUES ( '$uidinsert','$Name','$SSC_MARKS','$OUTOFF_SSC','$SSC_PERCENTAGE','$HSC_MARKS','$OUTOFF_HSC','$HSC_PERCENTAGE','$PHSIYCS','$OUTOFF_PHYSIYCS','$CHEMISTRY','$OUTOFF_CHEMISTRY','$MATHS','$OUTOFF_MATH','$PCM_AGGREGATE','$OUTOFF_PCM_AGGREGATE','$CET','$JEE')";


	$data = mysqli_query ($con,$query)or die(mysqli_error($con));
	if($data)
	{
	header("Location: index1.php"); 
	}

?>