<?php 


if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$username = $_POST['username'];
	$password = $_POST['password'];

	
}



$server = "localhost";
$user = "user";
$pswrd = "";
$db = "UserData";

$conn = new mysqli($server,$user,$pswrd,$db);

if($conn -> connect_errno){
	die("Connection Failed".$conn-> connect_error);
}


$sql = "SELECT * FROM data";
$result = $conn->query($sql);
$login = False;

if($result->num_rows > 0){

	while($row = $result->fetch_assoc()){

		if($row['Username'] == $username && $row['password'] == $password){
		
			$login = True;

		}

		
	}

	if(!$login){
		echo"Incorrect Username or Password";
	}

}



echo"$login";

$conn -> close();
?>