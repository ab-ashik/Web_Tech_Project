<?php
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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/css/client_index.css">
    <title>Document</title>
</head>

<body>
    
<header>
        <a href="" class="logo">Alpha Event Management</a>

        <ul class="navbar">
            <li><a href="index_client.php">Home</a></li>
            <li><a href="client_event_list.php">Event List</a></li>
            <li><a href="#">View All Vendors</a></li>
            <li><a href="index_R.php">Give Review</a></li>
        </ul>

        <div class="nav_btn" id="underline">
        <a href="#">[<?php echo $loginId ?>]</a>
        <a href="../controller/logout.php">Log Out</a>
        
        </div>
</header>
	<h1>List Of Client's Review</h1>
	<br>
	<table class="table">
	<thead>
		<tr>
			<th>Client ID</th>
			<th>Client Name</th>
			<th>Review</th>
		</tr>
	</thead>
	<tbody>
		<?php
		include("../controller/db/conn.php");

		$sql = "SELECT * FROM review";
		$result = $connection->query($sql);

		if(!$result)
		{
			die("invalid query: ". $connection->error);
		}
		 while($row = $result->fetch_assoc())
		 {
		 	echo "<tr>
		 	<td>" . $row['id'] . "</td>
		 	<td>" . $row['name'] . "</td>
		 	<td>" . $row['review'] . "</td>
		 	</tr>";
		 }

		?>
	</tbody>
</table>

	</body>
	</html>
	<?php
include('../view/footer.php');
?>