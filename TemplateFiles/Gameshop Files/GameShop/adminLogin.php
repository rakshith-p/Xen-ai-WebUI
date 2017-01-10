<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>ChooseUser</title>
    
    <link rel="stylesheet" href="css/style.css">

    
        <script src='js/loginMaker.js'></script>

        <script src="js/index.js"></script>
    
  </head>

  <body>

<div class="logmod">
  <div class="logmod__wrapper">
    
    <div class="logmod__container">
       <div class="logmod__tab-wrapper">
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
$user_id=$_POST["user-email"];
$password= $_POST["user-pw"];

$sql = "SELECT user_id, password FROM admin where user_id = '".$user_id."'";

$result = $conn->query($sql);
$success=0;
if ($result->num_rows > 0) {
    // output data of each row
	
	while($row = $result->fetch_assoc()) {
		if($row["user_id"] == $user_id && $row["password"] == $password)
			$success=1;
    }
} 

if($success == 1){
	echo '<span class="simform__actions-sidetext"><p> <strong> Login Successful </p></span>';
	echo '<div class="simform__actions"> <a href="http://localhost/AdminPanel/AdminFetch.php"> <input class = "sumbit" type = "button" value = "Continue To Console"></a></div>';
	
}
	
else{
	echo '<span class="simform__actions-sidetext"><p> <strong> Login Unsuccessful </p></span>';
	echo '<div class="simform__actions"> <a href="index.html"> <input class = "sumbit" type = "button" value = "Try Again"></a></div>';
}
	


$conn->close();
?>
      </div>
    </div>
  </div>
</div>

</body>
</html>