<!DOCTYPE html>
<html >
  <head>
  </head>
  <body>
	<form action=""<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"" method="post">
Name: <input type="text" name="fname">
Last name: <input type="text" name="lname">
<input type="submit">
</form>


<?php
// define variables and set to empty values
$name = $lname = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["fname"]);
  $lname = test_input($_POST["lname"]);
  
  
  echo '<h1> <a href="index.html">'. $name."</a></h1>";

}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
  ?>
  
  </body>
  
  
  </html>
