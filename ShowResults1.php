<!DOCTYPE html>
<html>
<head>
	<title>CAP ROUND 1 Result</title>
</head>
<body bgcolor="#E6E6FA">
	<style>
.button {
    background-color: #4CAF50;
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
</style>

	<?php
	include("auth.php");
    include("db.php");

            $uidcheck = $_SESSION['uid'];
            $sql = "SELECT * FROM result1 WHERE UID ='$uidcheck'";
			$rtv = mysqli_query($con,$sql) or die(mysqli_error($con));

			if($row = mysqli_fetch_array($rtv)){

                echo "<h1>You Have Been Alloted The Following College</h1> <br>";
				echo "<h2>"."College Name:-".$row['college_name']."</h2>" ;			}
			else {
				echo "<h2>No College Has been alloted to you</h2>"; 
		          } 
		  $allotedclg = $row['college_name']; 

       
         if(isset($_POST['submit'])){
         	$sqlc3 = "SELECT vacc FROM college_vac WHERE college_name='$allotedclg'";
	        $college_v = mysqli_query($con,$sqlc3) or die(mysqli_error($con));
	        $row = mysqli_fetch_array($college_v);
	        $dummy=$row['vacc']+1;
	        $sql_u="UPDATE college_vac SET vacc = $dummy WHERE college_name='$allotedclg' ";
		    $sql_run = mysqli_query($con,$sql_u) or die(mysqli_error($con));

		    $sql_x="INSERT INTO notaccept(UID) VALUES ('$uidcheck' )";
		    $query = mysqli_query($con,$sql_x) or die(mysqli_error($con));


         }


    ?><br><br>

<input type="button" class="button" value="previous"
onclick="window.location.href='index1.php' "/>
<?php
       $uidcheck = $_SESSION['uid'];
       $sqlcheck = "SELECT * FROM notaccept WHERE UID = $uidcheck";
       $newrtv = mysqli_query($con,$sqlcheck) or die(mysqli_error($con));

       $xrow = mysqli_fetch_array($newrtv);
      

         if($xrow< 1){
echo <<<end
<input type="button" class="button" value="Confirm This College"
onclick="window.location.href='Confirmclg.php' "/>
<form action="ShowResults1.php" method="POST">
	<input name="submit" class="button" type="submit" value="Not Accepted" />
</form>
end;
}else{
	echo "<h3>You Have Declined This college</h3>";
}
?>
</body>
</html>
