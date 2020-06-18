<?php
include("auth.php");
include("db.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome Home</title>



<style>
.button {
    background-color:  red;
    border: none;
    color: white;
    padding: 10px 22px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}


body, html {
    height: 100%;
    margin: 0;
}

.bg {
    background-image: url("Latvia-University-of-Jelgava.jpg");
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
</style>

<link rel="stylesheet" href="css/style.css" />
</head>
<body bgcolor="#E6E6FA" class="bg">
	<p align="right"><a class="button" href="logout.php">Logout</a></p>
<div class="form">
<p><h2>Welcome <?php echo $_SESSION['username']; ?></h2></p>
<form>
<?php

$uidcheck = $_SESSION['uid'];


$sql = "SELECT * FROM result1";
$rtv1 = mysqli_query($con,$sql) or die(mysqli_error($con));
			
if (mysqli_fetch_array($rtv1) < 1){
echo<<<EXY
<input type="button" value="Declare CAP 1 Result"
align="right"
onclick="declar.php "/>
EXY;
}
else
{
	echo<<<EXY
<input type="button" value="CAP 1 Result Declared " 
align="right"
onclick="window.location.href='declar.php' "/>
EXY;
}
    

$sql = "SELECT UID FROM collegepref2 WHERE UID ='$uidcheck'";
$rtv1 = mysqli_query($con,$sql) or die(mysqli_error($con));

if (mysqli_fetch_array($rtv1) == false){
echo<<<EXY
<input type="button" value="Declare Cap 2 Result"
align="right"
onclick="window.location.href='declar2.php' "/>
EXY;
}
else
{
	echo<<<EXY
<input type="button" value="CAP 2 Result Declared"
align="right"
onclick="window.location.href='index2.php' "/>
EXY;
}

?>
</form>
</div>
</body>
</html>
