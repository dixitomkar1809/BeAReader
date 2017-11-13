<?php
$servername = "localhost:3306";
$username = "root";
$password = "1234";
$dbname = "beareader";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
	die("Connection failed: " .mysqli_connecet_error());
}
$Search = $_GET["Search"];
$showData = "SELECT * FROM borrowers WHERE borrowers.Id LIKE '%$Search%'OR borrowers.SSN LIKE '%$Search%' OR borrowers.BorrowerName LIKE '%$Search%' OR borrowers.BorrowerAddress LIKE '%$Search%'OR borrowers.BorrowerPhone LIKE '%$Search%'";
$data = array();
$result = mysqli_query($conn, $showData);

if(mysqli_num_rows($result) > 0){
	while($row = mysqli_fetch_assoc($result)){
		$data[] = $row;
	}
} else {
	echo "0 results";
};
print json_encode($data);
mysqli_close($conn);

?>