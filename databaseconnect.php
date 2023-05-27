<?php
$servername = getenv('DB_SERVERNAME');
$database = getenv('DB_DATABASE');
$username = getenv('DB_USERNAME');
$password = getenv('DB_PASSWORD');

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

mysqli_close($conn);
?>