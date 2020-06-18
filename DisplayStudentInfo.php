
<!DOCTYPE html>
<html>
<body>

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
    while($row = $result->fetch_assoc()) {
        echo "<br> Code1: ". $row["code1"]. " - College1: ". $row["college1"]. "--Branch1: " . $row["branch1"] . "<br>";

        echo "<br> Code2: ". $row["code2"]. " - College2: ". $row["college1"]. "--Branch2: " . $row["branch2"] . "<br>";

        echo "<br> Code3: ". $row["code3"]. " - College3: ". $row["college1"]. "--Branch3: " . $row["branch3"] . "<br>";
    }
} else {
    echo "0 results";
}

$con->close();
?>

</body>
</html>
