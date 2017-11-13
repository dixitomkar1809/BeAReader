<?php
$servername = "localhost:3306";
$username = "root";
$password = "1234";
$dbname = "beareader";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
	die("Connection failed: " .mysqli_connecet_error());
}
$BookId = $_GET["BookId"];
$showData = "SELECT * from bookloans WHERE BookId='$BookId' AND DateIn IS NULL";
$data = array();
$result = mysqli_query($conn, $showData);

if(mysqli_num_rows($result) > 0){
	while($row = mysqli_fetch_assoc($result)){
		$data[] = $row;
	}
	echo "Not Available";
	// print json_encode($data);

} else {
	echo "Available";
	
};
mysqli_close($conn);
?>