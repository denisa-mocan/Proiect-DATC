<?php
require("conect_nfo.php");

function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}

// Opens a connection to a MySQL server
$connection=mysqli_connect ('datcs', $username, $password, $database);
if (!$connection) {
  die('Not connected : ' . mysqli_connect_error());
}

// Set the active MySQL database
/*$db_selected = mysqli_select_db($connection, $database);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysqli_connect_error());
}*/

// Select all the rows in the markers table
$query = "SELECT nr_crt, informatii.id, lat, lng, nume, zona, alerte, MAX(localizare.data) AS 'ultima' FROM informatii, localizare
WHERE informatii.id = localizare.id 
GROUP BY informatii.id ";
$result = mysqli_query($connection, $query);

if (!$result) {
  die('Invalid query: ' . mysqli_connect_error());
}

header("Content-type: text/xml");

// Start XML file, echo parent node
echo "<?xml version='1.0' ?>";
echo '<markers>';
$ind=0;
// Iterate through the rows, printing XML nodes for each
while ($row = @mysqli_fetch_assoc($result)){
  // Add to XML document node
  echo '<marker ';
  echo 'nr_crt="' . $row['nr_crt'] . '" ';
  echo 'id="' . parseToXML($row['id']) . '" ';
  echo 'nume="' . parseToXML($row['nume']) . '" ';
  echo 'lat="' . $row['lat'] . '" ';
  echo 'lng="' . $row['lng'] . '" ';
  echo 'zona="' . $row['zona'] . '" ';
  echo 'alerte="' . $row['alerte'] . '" ';
  echo 'ultima="' . $row['ultima'] . '" ';
  echo '/>';
  $ind = $ind + 1;
}

// End XML file
echo '</markers>';

mysqli_close($connection);

?>