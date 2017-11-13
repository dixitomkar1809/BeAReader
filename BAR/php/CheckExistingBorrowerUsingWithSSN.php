<?php
$servername = "localhost:3306";
$username = "root";
$password = "1234";
$dbname = "beareader";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
	die("Connection failed: " .mysqli_connecet_error());
}
$SSN = $_GET["SSN"];
$showData = "SELECT * from borrowers WHERE SSN='$SSN'";
$data = array();
$result = mysqli_query($conn, $showData);

if(mysqli_num_rows($result) > 0){
	while($row = mysqli_fetch_assoc($result)){
		$data[] = $row;
	}
	print json_encode($data);

} else {
	echo 'no one';
};
mysqli_close($conn);
?>