<!DOCTYPE html>
<html>

<head>
<style>
table, th, td {
     border: 1px solid black;
}
</style>
</head>

<body>

Hello Admin:
<?php
$servername = "localhost";
$username = "root";
$password = "Raks@1601";
$dbname = "gameshop";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$user_id=$_POST["cust_name"];

$sql = "SELECT user_id, password FROM admin where user_id = '".$user_id."'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	
	echo "<table><tr><th>Customer ID</th><th>Name</th></tr>";
	
	
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["user_id"]. "</td><td>" . $row["password"]. "</td></tr>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>

</body>
</html>