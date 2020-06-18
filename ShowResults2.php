<!DOCTYPE html>
<html>
<head>
	<title>CAP ROUND 1 Result</title>
</head>
<body>

	<?php
	include("auth.php");
    include("db.php");

            $uidcheck = $_SESSION['uid'];
            $sql = "SELECT * FROM result2 WHERE UID ='$uidcheck'";
			$rtv = mysqli_query($con,$sql) or die(mysqli_error($con));

			if($row = mysqli_fetch_array($rtv)){

                echo "You Have Been Alloted The Following College <br>";
				echo $row['college_name'] ;

			}
			else {
				echo "No College Has been alloted to you"; 
		          } 



    ?>

</body>
</html>
