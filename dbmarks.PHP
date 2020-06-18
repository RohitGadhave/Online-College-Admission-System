 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register";
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

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO 'marks' (Name,SSC_MARKS,OUTOFF_SSC,SSC_PERCENTAGE,HSC_MARKS,OUTOFF_HSC,HSC_PERCENTAGE,PHSIYCS,OUTOFF_PHYSIYCS,CHEMISTRY,OUTOFF_CHEMISTRY,MATHS,OUTOFF_MATH,PCM_AGGREGATE,OUTOFF_PCM_AGGREGATE,CET,JEE)
VALUES ( '$Name','$SSC_MARKS','$OUTOFF_SSC','$SSC_PERCENTAGE','$HSC_MARKS','$OUTOFF_HSC','$HSC_PERCENTAGE','$PHSIYCS','$OUTOFF_PHYSIYCS','$CHEMISTRY','$OUTOFF_CHEMISTRY','$MATHS','$OUTOFF_MATH','$PCM_AGGREGATE','$OUTOFF_PCM_AGGREGATE','$CET','$JEE')";

if ($conn->query($query) === TRUE) {
    require('marks.html');
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}

$conn->close();
?> 