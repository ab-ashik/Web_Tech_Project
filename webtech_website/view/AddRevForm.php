<?php
include("../controller/db/conn.php");


session_start();

// $loginId=$_REQUEST["loginId"];
// $role=$_REQUEST["role"];

$loginId=$_SESSION["loginId"];
$role=$_SESSION["role"];

if(!isset($_COOKIE['status'])){
    header('location: ../Model/login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/css/client_index.css">
    <title>Review_Box</title>
</head>

<style>
	.review{
		margin: 0 auto;
		width: 50%;
		padding: 100px;
		border: 1px solid #ccc;
		border-radius: 5px;
		margin-top: 50px;
		margin-bottom: 50px;

	}
	.review input{
		width: 100%;
		padding: 5px;
		border: 1px solid #ccc;
		border-radius: 5px;
		margin-bottom: 10px;
		height: 50px;
	}

	.review input[type="submit"]{
		width: 100%;
		padding: 5px;
		border: 1px solid #ccc;
		border-radius: 5px;
		background-color: #4CAF50;
		color: white;
	}

	.review input[type="submit"]:hover{
		background-color: #45a049;
	}

	.review fieldset{
		border: 1px solid #ccc;
		border-radius: 5px;
		padding: 10px;
	}

	.review p{
		text-align: center;
		font-size: 40px;
		font-weight: bolder;
	}

</style>

<body>
<header>
        <a href="" class="logo">Alpha Event Management</a>

        <ul class="navbar">
            <li><a href="index_client.php">Home</a></li>
            <li><a href="client_event_list.php">Event List</a></li>
            <li><a href="client_vendor_list.php">View All Vendors</a></li>
            <li><a href="AddRevForm.php">Give Review</a></li>
        </ul>

        <div class="nav_btn" id="underline">
        <a href="#">[<?php echo $loginId ?>]</a>
        <a href="../controller/logout.php">Log Out</a>
        
        </div>
</header>


<div class="review">
<p>Fill up data</p><br><br>
	<fieldset>
	<form method="post" action="../view/addReview.php">
		<b>Vendor Name:</b> <input type="text" name="clientId" placeholder="write the the name of the vendor"><br><br>
		<b>Your Name:</b> <input type="text" name="clientName" placeholder="write your name"><br><br>
		<b>Your Review:</b> <input type="text" name="clientReview" placeholder="write your words"><br><br>
		<input type="submit" name="submit" value="Submit">
	</form>
</fieldset>
</div>

</body>
</html>
<?php
include('../view/footer.php');
?>