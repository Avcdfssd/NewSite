<?php 


if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$fullname = $_POST['fullname'];
	$gender = $_POST['gender'];

	
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
$new = True;

if($result->num_rows > 0){

	while($row = $result->fetch_assoc()){

		if($row['username'] == $username && $row['password'] == $password){
			echo"Account Already exists. Please Login";
			$new = False;
		}

		
	}

	

}

if($new){

	$sql = "INSERT INTO Data (fullname,gender,username,password) VALUES('$fullname','$gender','$username','$password')";

	if($conn -> query($sql)){
		echo"Signed In as $fullname";
	}
}

$conn -> close();

?>