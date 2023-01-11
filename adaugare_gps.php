<?php

require("conect_info.php");

$connection=mysqli_connect ('datcs', $username, $password, $database);
if (!$connection) {
  die('Not connected : ' . mysqli_connect_error());
}

$nr_crt=$_POST['nr_crt'];
$id=$_POST['id'];
$lat=$_POST['lat'];
$lng=$_POST['lng'];
$data=$_POST['data'];

$query=mysqli_query($connection, "select * from localizare");
$row=mysqli_fetch_row($query);
date_default_timezone_set('Europe/Bucharest');
$date = date('Y-m-d H:i:s', time());

$query1=mysqli_query($connection, "insert into localizare values('$nr_crt', '$id','$lat','$lng','$date')");

echo "<div style='text-align:center'> Modificare a fost efectuata!</div>";
echo "<br><br>";
echo "<div style='text-align:center'> <form  method='POST' action='http://datcs/DATC/viz_ambrozie.php'> 
  <input type='SUBMIT' value='Vizualizare Ambrozie'> </form> </div>";

mysqli_close($connection);

?>