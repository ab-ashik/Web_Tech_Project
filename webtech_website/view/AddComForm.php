<?php
include('../view/head.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Complain Box</title>
</head>
<fieldset>
<body>
	Fill up data<br><br>
	<form method="post" action="../C_R/addComplain.php">
		<b>Id:</b> <input type="text" name="clientId"><br><br>
		<b>Name:</b> <input type="text" name="clientName"><br><br>
		<b>Complain:</b> <input type="text" name="clientComplain"><br><br>
		<input type="submit" name="submit" value="Submit">
	</form>
</fieldset>

</body>
</html>
<?php
include('../view/footer.php');
?>