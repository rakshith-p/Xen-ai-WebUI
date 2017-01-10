


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HTML Form</title>

<style type="text/css">

* { margin: 0; padding: 0; }

html { height: 100%; font-size: 62.5% }

body { height: 100%; background-color: #FFFFFF; font: 1.2em Verdana, Arial, Helvetica, sans-serif; }


/* ==================== Form style sheet ==================== */

form { margin: 25px 0 0 29px; width: 450px; padding-bottom: 30px; }

fieldset { margin: 0 0 22px 0; border: 1px solid #095D92; padding: 12px 17px; background-color: #DFF3FF; }
legend { font-size: 1.1em; background-color: #095D92; color: #FFFFFF; font-weight: bold; padding: 4px 8px; }

label.float { float: left; display: block; width: 100px; margin: 4px 0 0 0; clear: left; }
label { display: block; width: auto; margin: 0 0 10px 0; }
label.spam-protection { display: inline; width: auto; margin: 0; }

input.inp-text, textarea, input.choose, input.answer { border: 1px solid #909090; padding: 3px; }
input.inp-text { width: 300px; margin: 0 0 8px 0; }
textarea { width: 400px; height: 150px; margin: 0 0 12px 0; display: block; }

input.choose { margin: 0 2px 0 0; }
input.answer { width: 40px; margin: 0 0 0 10px; }
input.submit-button { font: 1.4em Georgia, "Times New Roman", Times, serif; letter-spacing: 1px; display: block; margin: 23px 0 0 0; }

form br { display: none; }

/* ==================== Form style sheet END ==================== */

</style>

</head>


<body>
<center>
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

$sql = 'Select max(GAME_ID) AS GAME_ID from game';
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$gameID= intval($row["GAME_ID"])+1;
	
	// $sql1='Update products set PRODUCT_DESCRIPTION="'.$_POST["GAME_NAME"].'"
	// ,PRICE="'.$_POST["PRICE"].'"
	// ,STOCKINSTORE="'.$_POST["STOCKINSTORE"].'" where PRODUCT_ID="'.$_POST["productID"].'"';
	
	// $sql2='Update game set GAME_NAME="'.$_POST["GAME_NAME"].'"
	// ,DEVELOPER="'.$_POST["DEVELOPER"].'" where PRODUCT_ID="'.$_POST["productID"].'"';
	
	// $sql3='Update game_category set CATEGORYTYPE="'.$_POST["CATEGORYTYPE"].'"where GAME_ID= (select GAME_ID from game where PRODUCT_ID="'.$_POST["productID"].'")';
	
	
	
	$sql1='Insert into products (STORE_ID, PRODUCT_ID, PRODUCT_DESCRIPTION, CATEGORY, PRODUCT_RATING, PRICE, MANUFACTURE, STOCKINSTORE, PRODUCTTYPE) values("2","'.$_POST["productID"].'","'.$_POST["GAME_NAME"].'","Single Player Game","'.$_POST["PRODUCT_RATING"].'","'.$_POST["PRICE"].'","'.$_POST["MANUFACTURE"].'","'.$_POST["STOCKINSTORE"].'","Game")';
	
	
	$sql2='Insert into Game (GAME_NAME, GAME_IMAGE, DEVELOPER,GAME_ID,PRODUCT_ID,RELEASEDATE)values ("'.$_POST["GAME_NAME"].'","Single Player Game","'.$_POST["DEVELOPER"].'","'.$gameID.'","'.$_POST["productID"].'","")';
	
	
	$sql3='Insert into game_category(GAME_ID, CATEGORYTYPE) values ("'.$gameID.'","'.$_POST["CATEGORYTYPE"].'")';
	

	
	
	$result = $conn->query($sql1);
	$result = $conn->query($sql2);
	$result = $conn->query($sql3);
	
?>


	<form action="AdminFetch.php" method="post">
		<!-- ============================== Fieldset 1 ============================== -->
		<fieldset>
			<legend>Update Status</legend>
			<label for="input-one" class="float" ><strong><?php if($result) echo '<p color="green">Update Successful</p>'; else echo '<p color="red">Update Successful</p>';?></strong></label>
			<br />
				
				
				<p><input class="submit-button" type="submit" alt="SUBMIT" name="Submit" value="Return to Product Listing" /></p>
		</fieldset>
		<!-- ============================== Fieldset 1 end ============================== -->


		
		<!-- ============================== Fieldset 3 end ============================== -->

		
	</form>
	
</center>
</body>
</html>
