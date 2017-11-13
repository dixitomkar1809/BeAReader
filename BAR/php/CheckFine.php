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
// $showData = "SELECT LoanId, DATEDIFF(CURDATE(), DueDate) as DateDiff FROM bookloans WHERE DateIn is null and LoanId not in (select LoanId from fines) ";
$showData = "SELECT LoanId, DATEDIFF(CURDATE(), DueDate) as DateDiff FROM bookloans WHERE LoanId = '$LoanId'" ;
// $showData = "SELECT LoanId, DATEDIFF(CURDATE(), DueDate) as DateDiff FROM bookloans WHERE DateIn IS NULL AND DATEDIFF(CURDATE(), DueDate) > 0" ;

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