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
    background-color:  #555555;
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
	<p align="right"><a href="logout.php">Logout</a></p>
<div class="form">
<p ><h2 style="text-align: center;" >Welcome <?php echo $_SESSION['username']; ?></h2></p>
<form>
<?php

        $uidcheck = $_SESSION['uid'];
        $sql = "SELECT UID FROM student_registration WHERE UID ='$uidcheck'";
			$rtv = mysqli_query($con,$sql) or die(mysqli_error($con));


if (mysqli_fetch_array($rtv) == false) {
	echo<<<END
<input type="button" class="button" value="Student Info"
align="right"
onclick="window.location.href='studreg.html'"/>
END;
}
else{
$sql = "SELECT UID FROM collegepref1 WHERE UID ='$uidcheck'";
			$rtv1 = mysqli_query($con,$sql) or die(mysqli_error($con));
if (mysqli_fetch_array($rtv1) == false){
echo<<<EXY
<input type="button" class="button" value="CAP Round 1 Preferences"
align="right"
onclick="window.location.href='clgkahtmlcode.php' "/>
EXY;
}
else
{

	echo<<<EXY
<input type="button" class="button" value="CAP Round 1 Preferences"
align="right"
onclick="window.location.href='DisplayCapRoundPrefrence.php' "/>
EXY;

$sql = "SELECT * FROM result1" ;
$rtv = mysqli_query($con,$sql) or die(mysqli_error($con));
$row = mysqli_fetch_array($rtv);

$uidcheck = $_SESSION['uid'];
       $sqlcheck = "SELECT * FROM notaccept WHERE UID = $uidcheck";
       $newrtv = mysqli_query($con,$sqlcheck) or die(mysqli_error($con));

       $xrow = mysqli_fetch_array($newrtv);



if($row > 0){
$sql = "SELECT UID FROM collegepref2 WHERE UID ='$uidcheck'";
			$rtv1 = mysqli_query($con,$sql) or die(mysqli_error($con));
if (mysqli_fetch_array($rtv1) == false)
{

if($xrow > 1){
echo<<<EXY
<input type="button" class="button" value="CAP Round 2 Preferences"
align="right"
onclick="window.location.href='clgkahtmlcode1.php' "/>
EXY;
}

$sql = "SELECT * FROM result1";
$rtv1 = mysqli_query($con,$sql) or die(mysqli_error($con));
if (mysqli_fetch_array($rtv1) == false)
{
echo<<<EXY
<input type="button" class="button" value="Results Cap 1"
align="right"
onclick="window.location.href='noresult.php' "/>
EXY;
}
else
{
	echo<<<EXY
<input type="button" class="button" value="See Result Cap 1"
align="right"
onclick="window.location.href='ShowResults1.php' "/>
EXY;
}



}
else
{
	echo<<<EXY
<input type="button" class="button" value="CAP Round 2 Preferences"
align="right"
onclick="window.location.href='DisplayCapRoundPrefrence2.php' "/>
EXY;
}
}

}



$sql = "SELECT * FROM result2" ;
$rtv = mysqli_query($con,$sql) or die(mysqli_error($con));
$row = mysqli_fetch_array($rtv);

if ($row > 0) {

$sql = "SELECT UID FROM result2 WHERE UID ='$uidcheck'";
			$rtv1 = mysqli_query($con,$sql) or die(mysqli_error($con));
if (mysqli_fetch_array($rtv1) == false)
{
echo<<<EXY
<input type="button" class="button" value="Result Cap 2"
align="right"
onclick="window.location.href='ShowResults2.php' "/>
EXY;
}
else
{
	echo<<<EXY
<input type="button" class="button" value="Results Cap 2"
align="right"
onclick="window.location.href='ShowResults2.php' "/>
EXY;
}
}
}


?>
</form>
</div>
</body>
</html>
