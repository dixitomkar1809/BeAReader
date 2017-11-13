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
$Fine = $_GET["Fine"];
// $Paid = 0;
$showData = "UPDATE fines SET FineAmt = '$Fine' WHERE LoanId='$LoanId'";
$data = array();
$result = mysqli_query($conn, $showData);
echo $result;
?>