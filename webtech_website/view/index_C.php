<?php
include('../view/head.php');
?>
<!DocType html>
<html lang ="en">
<head>
	<meta charset="UTF-8">
	<meta http-eqiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewpoint" content="width=device-width, initial-scale=1.0">
	<title>Show Complain</title>
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body style="margin: 50px;">
	<h1>List Of Client's Complain</h1>
	<br>
	<table class="table">
	<thead>
		<tr>
			<th>Client ID</th>
			<th>Client Name</th>
			<th>Complain</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "evmng";

        $connection=new mysqli($servername,$username,$password,$dbname);
		

		if($connection->connect_error)
		{
			die("Connection failed: ". $connection->connect_error);
		}

		$sql = "SELECT * FROM complain";
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
		 	<td>" . $row['complain'] . "</td>
		 	<td>
		 	<a class='btn btn-primary btn-sm' href=''>FeedBack</a>
		 	</td>
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