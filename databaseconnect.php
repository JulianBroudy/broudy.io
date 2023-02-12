<?php
$servername = "localhost";
$database = "u696790422_when_drunk";
$username = "u696790422_drunken";
$password = "zQt&A7dE3E7Mg5z?";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
 
$sqlQuery = "SELECT * FROM shitty_products";

$result = mysqli_query($conn, $sqlQuery) or die("Error in Selecting " . mysqli_error($conn));
$resultArray = array();
while($row =mysqli_fetch_assoc($result))
{
    $resultArray[] = $row;
}
echo json_encode($resultArray);



// if (mysqli_query($conn, $sqlQuery)) {
//       echo "New record created successfully";
// } else {
//       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }
mysqli_close($conn);
?>