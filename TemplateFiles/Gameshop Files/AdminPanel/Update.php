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
 
$sql = 'Select P.PRODUCT_ID AS PRODUCT_ID ,P.PRICE AS PRICE , GAME_NAME ,DEVELOPER,RELEASEDATE,CATEGORYTYPE,STOCKINSTORE FROM products p,game g,game_category c where p.PRODUCT_ID=g.PRODUCT_ID and g.GAME_ID=c.GAME_ID and P.PRODUCT_ID="'.$_POST["productID"].'"';
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>
	<form action="OnUpdate.php" method="post">
		<!-- ============================== Fieldset 1 ============================== -->
		<fieldset>
			<legend>Game Information</legend>
			<label for="input-one" class="float"><strong>PRODUCT ID:</strong></label><br />
				<input class="inp-text" name="productID" id="input-one" type="text" size="30" value="<?php echo $row["PRODUCT_ID"]?>" /><br />
				
				<label for="input-one" class="float"><strong>GAME_NAME:</strong></label><br />
				<input class="inp-text" name="GAME_NAME" id="input-one" type="text" size="30" value="<?php echo $row["GAME_NAME"]?>" /><br />

				<label for="input-two" class="float"><strong>DEVELOPER:</strong></label><br />
				<input class="inp-text" name="DEVELOPER"  id="input-two" type="text" size="30" value="<?php echo $row["DEVELOPER"]?>"/>
		</fieldset>
		<!-- ============================== Fieldset 1 end ============================== -->


		<!-- ============================== Fieldset 2 ============================== -->
		<fieldset>
			<legend>Product Details:</legend>
				<label for="input-one" class="float"><strong>PRICE $ :</strong></label><br />
				<input class="inp-text" name="PRICE" id="input-one" type="text" size="30" value="<?php echo $row["PRICE"]?>" /><br />

				<label for="input-two" class="float"><strong>RELEASE DATE:</strong></label><br />
				<input class="inp-text" name="RELEASEDATE"  id="input-two" type="text" size="30" value="<?php echo $row["RELEASEDATE"]?>"/>
				
				<label for="input-two" class="float"><strong>STOCK IN STORE:</strong></label><br />
				<input class="inp-text" name="STOCKINSTORE"  id="input-two" type="text" size="30" value="<?php echo $row["STOCKINSTORE"]?>"/>
		</fieldset>
		<!-- ============================== Fieldset 2 end ============================== -->


		<!-- ============================== Fieldset 3 ============================== -->
		<fieldset>
			<legend>GAME CATEGORY:</legend>
			
			<select class="srchTxt" name="CATEGORYTYPE">
			<option><?php echo $row["CATEGORYTYPE"]?></option>
			<option>ACTION</option>
			<option>ADVENTURE </option>
			<option>ROLE PLAYING </option>
			<option>FASHION</option>
			<option>STRATEGY </option>
			<option>ARCADE </option>
			<option>SPORTS </option>
			<option>RACING </option>
			
			
					
		</select> 
		</fieldset>
		<!-- ============================== Fieldset 3 end ============================== -->

		<p><input class="submit-button" type="submit" alt="SUBMIT" name="Submit" value="Update" /></p>
	</form>
	
</center>
</body>
</html>
