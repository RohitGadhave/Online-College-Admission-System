<!DOCTYPE html>
<html>
<head>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
.button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 10px 32px;
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
<form action="dbcollegpref1.php" method="POST">
<h1>College Preference</h1>
<h4>NOTE: Please enter 3 college names from previous college list </h4>

<?php
include("auth.php");
include("db.php");

$sql = "SELECT * FROM college_vac";
$result = mysqli_query($con,$sql) or die(mysqli_error($con));?>

<table>
  <tr>
    <th>Sr.No</th>
    <th>College</th>
  </tr>
  <tr>
 <td>1</td>

    

<?php
$sql = "SELECT * FROM college_vac";
$result = mysqli_query($con,$sql) or die(mysqli_error($con));?>


    <td><select name="college1">
   <?php while ($row = mysqli_fetch_array($result)) {
    echo "<option value='" . $row['college_name'] . "'>" . $row['college_name'] . "</option>";
}?></select></td>

<?php
$sql = "SELECT * FROM college_vac";
$result = mysqli_query($con,$sql) or die(mysqli_error($con));?>
    
  </tr>
<?php
$sql = "SELECT * FROM college_vac";
$result = mysqli_query($con,$sql) or die(mysqli_error($con));?>

<tr>
 <td>2</td>

    

<?php
$sql = "SELECT * FROM college_vac";
$result = mysqli_query($con,$sql) or die(mysqli_error($con));?>


    <td><select name="college2">
   <?php while ($row = mysqli_fetch_array($result)) {
    echo "<option value='" . $row['college_name'] . "'>" . $row['college_name'] . "</option>";
}?></select></td>

<?php
$sql = "SELECT * FROM college_vac";
$result = mysqli_query($con,$sql) or die(mysqli_error($con));?>


    
  </tr>

<?php
$sql = "SELECT * FROM college_vac";
$result = mysqli_query($con,$sql) or die(mysqli_error($con));?>

  <tr>
    <td>3</td>


    

<?php
$sql = "SELECT * FROM college_vac";
$result = mysqli_query($con,$sql) or die(mysqli_error($con));?>


    <td><select name="college3">
   <?php while ($row = mysqli_fetch_array($result)) {
    echo "<option value='" . $row['college_name'] . "'>" . $row['college_name'] . "</option>";
}?></select></td>

<?php
$sql = "SELECT * FROM college_vac";
$result = mysqli_query($con,$sql) or die(mysqli_error($con));?>



    
  </tr>

















 
</table>

<br><br>

<input type="submit" class="button" value="submit">
</form>

</body>
</html>
	
	
	
