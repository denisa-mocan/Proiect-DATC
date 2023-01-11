<?php

require("phpsqlajax_dbinfo.php");

$connection=mysqli_connect ('localhost', $username, $password, $database);
if (!$connection) {
  die('Not connected : ' . mysqli_connect_error());
}

$id=$_POST['id'];

$query = "SELECT * FROM localizare where id=$id";
$result = mysqli_query($connection, $query);

if (!$result) {
  die('Invalid query: ' . mysqli_connect_error());
}

echo "<table border='1' align='center'>";
$coln=mysqli_num_fields($result); 
echo"<tr bgcolor='silver'>";
echo "<th>Nr_crt</th>";
echo "<th>ID</th>";
echo "<th>Latitudine</th>";
echo "<th>Longitudine</th>";
echo "<th>Data</th>";
echo "</tr>";

while ($row = @mysqli_fetch_assoc($result)){
    echo"<tr>";
    foreach ($row as $value){
        echo "<td>$value</td>";
    }
    echo "</tr>";
}
echo "</table>"; 

echo "<div style='text-align:center'> <form  method='POST' action='http://datcs/DATC/viz_anim.php'> 
  <input type='SUBMIT' value='Back'> </form> </div>";

mysqli_close($connection);

?>