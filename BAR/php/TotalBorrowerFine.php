<?php
$servername = "localhost:3306";
$username = "root";
$password = "1234";
$dbname = "beareader";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
	die("Connection failed: " .mysqli_connecet_error());
}
// $BorrowerId = $_GET["Id"];
$showData = "SELECT borrowers.*, sum(fines.FineAmt) as TotalFine
from borrowers, books, bookloans, fines
where bookloans.BookId = books.ISBN and bookloans.BorrowerId = borrowers.Id and bookloans.LoanId = fines.LoanId and fines.Paid=0 
group by borrowers.BorrowerName";
$data = array();
$result = mysqli_query($conn, $showData);

if(mysqli_num_rows($result) > 0){
	while($row = mysqli_fetch_assoc($result)){
		$data[] = $row;
	}
} else {
	echo "null";
};
print json_encode($data);
mysqli_close($conn);
?>