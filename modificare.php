<?php

require("phpsqlajax_dbinfo.php");

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

while ($row = @mysqli_fetch_assoc($result)){
    echo "<form method='POST'
    action='http://datcs/DATC/modificare2.php'>
    <table border='3' align='center' bgcolor='silver'>
    <tr>
    <td>ID:</td> 
    <td>
    <input type='text' value='".$row["id"]."'name='id_form'>
    </td>
    </tr>
    <tr>
    <td>Nume:</td>
    <td>
    <input type='text' value='".$row["nume"]."'name='nume_form'>
    </td>
    </tr>
    <tr>
    <td>Specie:</td>
    <td>
    <input type='text' value='".$row["specie"]."'name='specie_form'>
    </td>
    </tr>
    <tr>
    <td>Zona:</td>
    <td>
    <input type='text' value='".$row["zona"]."'name='zona_form'>
    </td>
    </tr>
    <tr>
    <td>Alerte:</td>
    <td>
    <input type='text' value='".$row["alerte"]."'name='alerte_form'>
    </td>
    </tr>
    <tr>
    <td colspan='2' align='center'>
    <input type='SUBMIT' value='Modifica' >
    </td>
    </tr>
    
    </table>
    </form>"; 

    /*  ^^ acolo unde e spatiu
    <tr>
    <td colspan='2' align='center'>
    <input type='SUBMIT' value='Sterge'>
    </td>
    </tr>*/

    echo "<div style='text-align:center'> <form  method='POST' action='http://datcs/DATC/sterge_animal.php'>
      <input type='hidden' name='id' value=".$row["id"].">
      <input type='SUBMIT' value='Sterge animal'> </form> </div>";
    
    echo "<div style='text-align:center'> <form  method='POST' action='http://datcs/DATC/viz_anim.php'>
      <input type='SUBMIT' value='Back'> </form> </div>";
}

mysqli_close($connection);

?>