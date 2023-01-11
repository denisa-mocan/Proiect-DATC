<?php

require("phpsqlajax_dbinfo.php");

$connection=mysqli_connect ('datcs', $username, $password, $database);
if (!$connection) {
  die('Not connected : ' . mysqli_connect_error());
}

$query = "SELECT * FROM informatii";
$result = mysqli_query($connection, $query);

if (!$result) {
  die('Invalid query: ' . mysqli_connect_error());
}

echo "<br><br><br><br>";

echo "<table border='1' align='center'>";
$coln=mysqli_num_fields($result); 
echo"<tr bgcolor='silver'>";
/*while ($property = mysqli_fetch_field($result)) {
    echo "<th> $property->name </th>";
}*/
echo "<th>ID</th>";
echo "<th>Nume</th>";
echo "<th>Zona</th>";
echo "<th>Alerte</th>";
//echo"<th> <form  method='POST' action='http://datcs/DATC/viz_anim.php'> <input type='SUBMIT' value='d'> </form></th>";
echo"</tr>";

while ($row = @mysqli_fetch_assoc($result)){
    echo"<tr>";
    foreach ($row as $value){
        echo "<td>$value</td>";
    }
    echo "<td> <form method='POST' action='http://datcs/DATC/istoric.php'> 
      <input type='hidden' name='id' value=".$row["id"].">
      <input type='SUBMIT' value='Istoric locatii'> </form> </td>";
    echo "<td> <form method='POST' action='http://datcs/DATC/modificare.php'> 
      <input type='hidden' name='id' value=".$row["id"].">
      <input type='SUBMIT' value='Modificari' > </form> </td>";
    //echo "<td> <form method='POST' action='http://datcs/DATC/viz_anim.php'> <input type='SUBMIT' value='Dezactivare' > </form> </td>";
    echo"</tr>";
}
echo"</table>"; 

echo "<br><br><br>";
echo "<div style='text-align:center'> <form  method='POST' action='http://datcs/DATC/adaugare.html'> <input type='SUBMIT' value='Adaugare ambrozie'> </form> 
 <form  method='POST' action='http://datcs/DATC'> <input type='SUBMIT' value='Harta'> </form> </div>";

mysqli_close($connection);

?>