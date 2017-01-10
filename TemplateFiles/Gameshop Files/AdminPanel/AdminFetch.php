<!DOCTYPE html>
<html lang="en">

<head>

<style type="text/css">
table.imagetable {
	font-family: verdana,arial,sans-serif;
	font-size:11px;
	color:#333333;
	border-width: 1px;
	border-color: #999999;
	border-collapse: collapse;
}
table.imagetable th {
	background:#b5cfd2 url('cell-blue.jpg');
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #999999;
}
table.imagetable td {
	background:#dcddc0 url('cell-grey.jpg');
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #999999;
}
</style>



</head>

<body>
	 <center> <h1>Welcome to Admin Console</h1>
	<h2> Product Catalog </h2>
	<form action="Update.php" method="post">
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
 
$sql = "Select P.PRODUCT_ID AS PRODUCT_ID ,P.PRICE AS PRICE , GAME_NAME ,DEVELOPER,RELEASEDATE,CATEGORYTYPE,STOCKINSTORE FROM products p,game g,game_category c where p.PRODUCT_ID=g.PRODUCT_ID and g.GAME_ID=c.GAME_ID";
$result = $conn->query($sql);
if($result->num_rows >0)
{
	echo '<strong><i>Select Game to edit</i></strong>';
	echo '<table class="imagetable"><tr><th> SELECT</th><th>GAME_NAME</th><th>DEVELOPER</th><th>Price</th><th>RELEASE DATE</th> <th>CATEGORY TYPE</th><th>STOCK IN STORE</th></tr>';
while($row = $result->fetch_assoc())
	{
        echo '<tr>
		<td> <input type="radio" name="productID" value="'.$row["PRODUCT_ID"].'" /> </td>
		<td>'.$row["GAME_NAME"].'</td><td>'.$row["DEVELOPER"]. '</td>
		<td>$  '.$row["PRICE"].'</td><td>'.$row["RELEASEDATE"].'</td><td>'.$row["CATEGORYTYPE"]. '</td>
		<td>'.$row["STOCKINSTORE"]. '</td>
		</tr>';
    }
	echo "</table>";
}
$conn->close();
	?>
	<br/>
<input type="submit" value="Update Selected"> <i> OR </i>
<a href="insert.php"><input type="button" value="Insert New Product"/></a>
</form>

</center>
</body>

</html>