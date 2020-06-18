<?php
include("auth.php");
include("db.php");
?>

<html>
<?php
 $sql = "SELECT UID,JEE FROM marks ORDER BY JEE DESC";
 $jeemarks = mysqli_query($con,$sql) or die(mysqli_error($con));
 $UID_from_jeemarks = array();
 $JEE_from_jeemarks = array();
 $x=0;$y=0;


 while ($row = mysqli_fetch_array($jeemarks)) {
 	$UID_from_jeemarks[$x++]=$row['UID'];
 	$JEE_from_jeemarks[$y++]=$row['JEE'];
    echo $UID_from_jeemarks[--$x] ."******** " .$JEE_from_jeemarks[--$y] ;

    $x++;$y++;
    echo"<br>";
}
  echo"<br>";  echo"<br>";  echo"<br>";

 $sql = "SELECT college_name,vacc,cut_off FROM college_vac ";


 $college_vac = mysqli_query($con,$sql) or die(mysqli_error($con));
 $clgname_from_clgvac = array();
 $vacc_from_clgvac = array();
 $cut_from_clgvac=array();

 $x=0;$y=0;$z=0;


 while ($row = mysqli_fetch_array($college_vac)) {
 	$clgname_from_clgvac[$x++]=$row['college_name'];
 	$vacc_from_clgvac[$y++]=$row['vacc'];
 	$cut_from_clgvac[$z++]=$row['cut_off'];

    echo $clgname_from_clgvac[--$x] ."******** " .$vacc_from_clgvac[--$y]."******** ".$cut_from_clgvac[--$z] ;
    
    $x++;$y++;$z++;
    echo"<br>";
}








echo"<br>";  echo"<br>";  echo"<br>";

$count_UID=count($UID_from_jeemarks);

 $college1;$college2;$college3;


 for ($i=0; $i <$count_UID ; $i++)
  { 
 	
	 $sql = "SELECT college1,college2,college3 FROM collegepref2 WHERE UID = $UID_from_jeemarks[$i]";

	 $college_pref = mysqli_query($con,$sql) or die(mysqli_error($con));
	$row = mysqli_fetch_array($college_pref);
	$college1=$row['college1'];
	$college2=$row['college2'];
	$college3=$row['college3'];
	$rowc1;

echo "START   ";

	$sqlc1 = "SELECT vacc,cut_off FROM college_vac WHERE college_name ='$college1'  ";
	 $college_1 = mysqli_query($con,$sqlc1) or die(mysqli_error($con));
	$rowc1 = mysqli_fetch_array($college_1);



	$sqlc2 = "SELECT vacc,cut_off FROM college_vac WHERE college_name='$college2'";
	 $college_2 = mysqli_query($con,$sqlc2) or die(mysqli_error($con));
	$rowc2 = mysqli_fetch_array($college_2);



	$sqlc3 = "SELECT vacc,cut_off FROM college_vac WHERE college_name='$college3'";
	 $college_3 = mysqli_query($con,$sqlc3) or die(mysqli_error($con));
	$rowc3 = mysqli_fetch_array($college_2);


	echo "FINISH   ";	echo"<br>";

	if ( $rowc1['vacc'] != 0 && $JEE_from_jeemarks[$i]>=$rowc1['cut_off'] ) 
	{
		echo $college1;	echo"<br>";
		$sql_r="INSERT INTO result2(UID,college_name) VALUES ($UID_from_jeemarks[$i],'$college1' )";
		 $sql_run = mysqli_query($con,$sql_r) or die(mysqli_error($con));

		 $dummy=$rowc1['vacc']-1;

		$sql_u="UPDATE college_vac SET vacc = $dummy WHERE college_name='$college1' ";
		$sql_run = mysqli_query($con,$sql_u) or die(mysqli_error($con));


	}


	else if( $rowc2['vacc'] != 0 && $JEE_from_jeemarks[$i]>=$rowc2['cut_off'] )
	{

		$sql_r="INSERT INTO result2(UID,college_name) values ($UID_from_jeemarks[$i],'$college2' )";
		 $sql_run = mysqli_query($con,$sql_r) or die(mysqli_error($con));

		  $dummy=$rowc2['vacc']-1;

		$sql_u="UPDATE college_vac SET vacc = $dummy WHERE college_name='$college2' ";
		$sql_run = mysqli_query($con,$sql_u) or die(mysqli_error($con));



	}
	else if( $rowc3['vacc'] != 0 && $JEE_from_jeemarks[$count_UI]>=$rowc3['cut_off'] )
	{

		$sql_r="INSERT INTO result2(UID,college_name) values ($UID_from_jeemarks[$i],'$college3' )";
		$sql_run = mysqli_query($con,$sql_r) or die(mysqli_error($con));


		  $dummy=$rowc3['vacc']-1;

		$sql_u="UPDATE college_vac SET vacc = $dummy WHERE college_name='$college3' ";
		$sql_run = mysqli_query($con,$sql_u) or die(mysqli_error($con));




	}




}

header('index2.php');

?>





