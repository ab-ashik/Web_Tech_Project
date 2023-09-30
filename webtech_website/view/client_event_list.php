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
<html>
<head>
<link rel="stylesheet" href="../view/css/client_index.css">
  <title></title>
  <style>
table, th, td {
  border: 1px solid;
  text-align: center;
}

table {
  width: 100%;
  margin-bottom: 27rem;
}

th {
  background-color:cornflowerblue;
}
tr:nth-child(even) {background-color:lightblue;}
tr:nth-child(odd) {background-color:cornsilk;}

.del_vendor{
  background-color: red;
  color: white;
  border: 1px solid;
  border-radius: 5px;
  padding: 10px;
  text-decoration: none;
  text-align: center;
  margin-bottom: 2rem;
}
</style>
</head>
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

<form name="vendor_list" action="" method="POST">


</form>

<p style="text-align: center;background-color:coral;margin-top: 3rem;margin-bottom: 3rem;font-size:35px;font-weight:bolder;letter-spacing:5px;">Event List</p>

<div class="del_vendor">
<form action="" method="POST">
<label>Order Event Using event's ID :</label>
<input type="text" name="order_event" id="del_event" required>
<input type="radio" name="bkash" id="bkash" required>
<label for="bkash">Bkash Pay </label>
<input type="submit" name="order_event_btn" id="order_event_btn" value="Order" onclick="">
</form>
</div>



<?php
include("../controller/db/conn.php");
 // select or read data start
$sql = "SELECT eId, eType, eDuration, eRate, vendorName FROM event";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr> <th>Event_ID</th> <th>Event Type</th> <th>Event Duration</th> <th>Event Rate</th> <th> Vendor Name</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr > 
        <td >" . $row["eId"]. "</td> 
         <td>" . $row["eType"]. "</td>
         <td>" . $row["eDuration"]. "</td>
         <td>" . $row["eRate"]. "</td>
         <td>" . $row["vendorName"]. "</td>



        </tr>";

    }
    echo "</table>";
} else {
  echo "<p style='text-align:center;'>0 Event available now....</p>";
}

$conn->close();

?>


<?php
include("../controller/db/conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($_POST['order_event_btn'])){



    $sql = "SELECT clientId, clientName, clientAdrs FROM client";
    $result = $conn->query($sql);

    if ($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {
            $client_id = $row["clientId"];
            $client_name = $row["clientName"];
            $client_adrs = $row["clientAdrs"];
        }
    }

    $event_id = $_POST['order_event'];
    $sql3 = "SELECT  eType, eRate, vendorName FROM event WHERE eId = '$event_id'";
    $result2 = $conn->query($sql3);
    if ($result2->num_rows > 0)
    {
        while($row = $result2->fetch_assoc())
        {
            $event_type = $row["eType"];
            $event_rate = $row["eRate"];
            $vendor_name = $row["vendorName"];
        }
    }






    $sql2 = "INSERT INTO account (accId, accName, accAdrs, eventType, payment, vendorName)
    VALUES ('$client_id', '$client_name', '$client_adrs', '$event_type', '$event_rate', '$vendor_name')";

    if ($conn->query($sql2) === TRUE) {
        echo "Order placed successfully";   
      header("Location: order_success.php");
    
    } else {
      echo "Error deleting record: " . $conn->error;
    }

  }
}

$conn->close();
    
?>


<p style="margin-bottom: 3rem;"></p>
</body>
</html>


<?php
include("footer.php");
?>