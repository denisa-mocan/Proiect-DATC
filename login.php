<?PHP
error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST['email']) && !empty(isset($_POST['email'])) && isset($_POST['password']) && !empty(isset($_POST['password']))){
	include_once("connection.php");
	
	$email = $_POST['email'];
	$password = $_POST['password'];
	
    $sql = "SELECT email, password FROM table_user WHERE email = '$email' AND password = '$password'";
	
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		echo "LoginSuccess";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

}?>