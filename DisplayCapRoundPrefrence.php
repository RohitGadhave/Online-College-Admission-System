
<!DOCTYPE html>
<html><head>
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
</head>
<body bgcolor="#E6E6FA">


<?php

include'auth.php';
include'db.php';
if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$uidcheck = $_SESSION['uid'];

$sql = "SELECT * FROM collegepref1 WHERE UID = $uidcheck ";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo'<br><h2><p style = "color: red">Your Selected Preferences For CAP ROUND 1 Are :</p></h2>';
    echo "<style>table, th, td {
    border: 3px solid pink;
    border-collapse: collapse;
}</style>";
   echo '<table style="width:100%;">';
  echo' <tr>
    <th>College Name</th> 
  </tr>';
    while($row = $result->fetch_array()) {
    	echo '<tr style="text-align: center;">';
        echo "<td>". $row["college1"]."</td>" ;
        echo "</tr>";

        echo '<tr style="text-align: center;">';
        echo " <td> ". $row["college2"]."</td>" ;
        echo "</tr>";

        echo '<tr style="text-align: center;">';
        echo " <td> ". $row["college3"]."</td>";
        echo "</tr>";
    }
   echo" </table>";
} else {
    echo "0 results";
}

$con->close();
?> 
	<br>
<input type="button"  class="button" value="previous"
onclick="window.location.href='index1.php' "/>
</body>
</html>
