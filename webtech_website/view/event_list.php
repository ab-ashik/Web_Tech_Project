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
<link rel="stylesheet" href="../view/css/vendor_index.css">
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
            <li><a href="index_vendor.php">Home</a></li>
            <li><a href="event_list.php">Event List</a></li>
            <li><a href="add_event.php">Add/Update Event</a></li>
            <li><a href="recent_orders.php">Recent Orders</a></li>
            <li><a href="showReviews.php">Show Reviews</a></li>
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
<label>Delete Event Using event's ID :</label>
<input type="text" name="del_event" id="del_event">
<input type="submit" name="del_event_btn" id="del_event_btn" value="Delete Event">
</form>
</div>



<?php
include("../controller/db/conn.php");
 // select or read data start
$sql = "SELECT eId, eType, eDuration, eRate FROM event";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr> <th>Event_ID</th> <th>Event Type</th> <th>Event Duration</th> <th>Event Rate</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr > 
        <td >" . $row["eId"]. "</td> 
         <td>" . $row["eType"]. "</td>
         <td>" . $row["eDuration"]. "</td>
         <td>" . $row["eRate"]. "</td>



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
  if(isset($_POST['del_event_btn'])){
    $event_id = $_POST['del_event'];
    $sql = "DELETE FROM event WHERE eId='$event_id'";

    if ($conn->query($sql) === TRUE) {
      //echo "Record deleted successfully";
      header("Location: event_list.php");
    
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