<?php

require("conect_info.php");

$connection=mysqli_connect ('datcs', $username, $password, $database);
if (!$connection) {
  die('Not connected : ' . mysqli_connect_error());
}

$id=$_POST['id'];

$query = "SELECT * FROM informatii where id=$id";
$result = mysqli_query($connection, $query);

if (!$result) {
  die('Invalid query: ' . mysqli_connect_error());
}

$query2 = mysqli_query($connection, "DELETE FROM localizare where id='$id'");
$query =mysqli_query($connection, "DELETE FROM informatii where id='$id'");

echo "<div style='text-align:center'> Modificare a fost efectuata!</div>";
echo "<br><br>";
echo "<div style='text-align:center'> <form  method='POST' action='http://datcs/DATC/viz_anim.php'> 
  <input type='SUBMIT' value='Vizualizare Animale'> </form> </div>";

mysqli_close($connection);

?>