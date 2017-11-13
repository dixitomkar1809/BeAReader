<?php
$servername = "localhost:3306";
$username = "root";
$password = "1234";
$dbname = "beareader";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
	die("Connection failed: " .mysqli_connecet_error());
}
$Search= explode(" ", $_GET["Search"]);
$x="";
for ($i = 0; $i <count($Search); $i++) 
	{
		$Search[$i]=trim($Search[$i]);
		if(strcmp($Search[$i],""))
		{
			$x.="'%$Search[$i]%' ";
			if($i<count($Search)-1)
				$x.=" or ";
		}
	}
$showData = "SELECT books.*, GROUP_CONCAT(DISTINCT authors.AuthorName SEPARATOR ',') as AuthorName
FROM books, authors, contributions
WHERE books.ISBN = contributions.BookId AND contributions.AuthorId = authors.Id AND (books.BookName LIKE ($x) OR books.ISBN LIKE ($x) OR AuthorName LIKE ($x) )
GROUP BY books.ISBN";
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