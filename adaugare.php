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

$query=mysqli_query($connection, "select count(*) from informatii where id='$id'");
$row=mysqli_fetch_row($query);
$nr=$row[0];

if($nr==0){
    $query1=mysqli_query($connection, "insert into informatii values('$id','$nume','$zona', '$alerte')");
}
else{
    echo "<center>";
    echo "ID-ul respectiv exista in baza de date!";
    echo "</center>";
}

echo "<div style='text-align:center'> Modificare a fost efectuata!</div>";
echo "<br><br>";
echo "<div style='text-align:center'> <form  method='POST' action='http://datcs/DATC/viz_ambozie.php'> 
  <input type='SUBMIT' value='Vizualizare Ambrozie'> </form> </div>";

mysqli_close($connection);

?>