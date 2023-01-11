<?php

require("conect_info.php");

$connection=mysqli_connect ('datcs', $username, $password, $database);
if (!$connection) {
  die('Not connected : ' . mysqli_connect_error());
}

$id=$_POST['id_form'];
$nume=$_POST['nume_form'];
$zona=$_POST['zona_form'];
$alerte=$_POST['alerte_form'];

$query = "SELECT * FROM informatii where id=$id";
$result = mysqli_query($connection, $query);

if (!$result) {
  die('Invalid query: ' . mysqli_connect_error());
}

$query =mysqli_query($connection, "update informatii set id='$id', nume='$nume',
specie='$specie', zona='$zona', alerte='$alerte' where id='$id'"); 


echo "<div style='text-align:center'> Modificare a fost efectuata!</div>";
echo "<br><br>";
echo "<div style='text-align:center'> <form  method='POST' action='http://datcs/DATC/viz_anim.php'> 
  <input type='SUBMIT' value='Vizualizare Ambrozie'> </form> </div>";

mysqli_close($connection);

?>