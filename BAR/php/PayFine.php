<?php
$servername = "localhost:3306";
$username = "root";
$password = "1234";
$dbname = "beareader";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
	die("Connection failed: " .mysqli_connecet_error());
}

$LoanId = $_GET["LoanId"];

$showData = "UPDATE fines 
			SET Paid=1
			WHERE LoanId='$LoanId'";
$data = array();
$result = mysqli_query($conn, $showData);

// if(mysqli_num_rows($result) > 0){
// 	while($row = mysqli_fetch_assoc($result)){
// 		$data[] = $row;
// 	}
// } else {
// 	echo "0 results";
// };
echo $result;
print json_encode($data);
mysqli_close($conn);
?>