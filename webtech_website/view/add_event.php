<?php
session_start();

// $loginId=$_REQUEST["loginId"];
// $role=$_REQUEST["role"];

$loginId = $_SESSION["loginId"];
$role = $_SESSION["role"];

if (!isset($_COOKIE['status'])) {
  header('location: ../Model/login.php');
}

?>



<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="../view/css/vendor_index.css">
  <title></title>
  <style>

    #add_mod {

      padding: 14px 20px;
      margin-top: 15px;
      border: none;
      cursor: pointer;
      width: 100%;
    }

    .crud_event {
      margin-left: 30%;
      margin-right: 30%;
      margin-top: 5%;
      margin-bottom: 5%;
      padding: 10px;
      border: 1px solid;
      text-align: center;
    }

    .crud_event input[type="text"] {
      width: 50%;
      padding: 12px 20px;
      margin: 8px 0;
      box-sizing: border-box;
      border: 2px solid #ccc;
      border-radius: 4px;
      outline: none;
    }

    .crud_event input[type="submit"] {
      width: 25%;
      background-color: #4CAF50;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .crud_event input[type="submit"]:hover {
      background-color: #45a049;
    }

    .crud_event {
      border-radius: 5px;
      background-color: #f2f2f2;
    }

    .crud_event h1 {
      font-size: 40px;
      margin-bottom: 20px;

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


  <form name="add_mod" method="POST" id="add_mod" action="" onsubmit="return eventCheck(); return false;" method="POST">

    <div class="crud_event">
      <h1>Add Moderator</h1>

      <label for="event_id">ID:</label>
      <input type="text" id="event_id" name="event_id" placeholder="Event ID"><p  style="color: red;"id="eiderr"></p><br>

      <label for="event_type">Name:</label>
      <input type="text" id="event_type" name="event_type" placeholder="Event Type"><p  style="color: red;"id="etypeerr"></p><br>

      <label for="event_duration">Event Duration:</label>
      <input type="text" id="event_duration" name="event_duration" placeholder="Event Duration"><p  style="color: red;"id="edurationerr"></p><br>

      <label for="event_rate">Event Rate:</label>
      <input type="text" id="event_rate" name="event_rate" placeholder="Event Rate"><p  style="color: red;"id="erateerr"></p><br>

      <input type="submit" name="btn_event_add" id="btn_event_add" value="Add Event">
      <input type="submit" name="btn_event_update" id="btn_event_update" value="Update Data">
    </div>

  </form>







  <?php
  include("../controller/db/conn.php");


  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 
  else {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (isset($_POST['btn_event_add'])) {
        $event_id = $_POST['event_id'];
        $event_type = $_POST['event_type'];
        $event_duration = $_POST['event_duration'];
        $event_rate = $_POST['event_rate'];
        $vendor_name = $loginId;


        $sql = "INSERT INTO event (eId, eType, eDuration, eRate, vendorName)
        VALUES ('$event_id', '$event_type', '$event_duration', '$event_rate', '$vendor_name')";




        if ($conn->query($sql) === TRUE) {
          // echo "sql record created successfully <br>";
          header("Location: event_list.php");
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
      }
    }
    if(isset($_POST['btn_event_update'])){
        $event_id = $_POST['event_id'];
        $event_type = $_POST['event_type'];
        $event_duration = $_POST['event_duration'];
        $event_rate = $_POST['event_rate'];
        $vendor_name = $loginId;


      $sql = "UPDATE event SET eType='$event_type', eDuration='$event_duration', eRate='$event_rate'  WHERE eId='$event_id'";

      if ($conn->query($sql) === TRUE) {
        header("Location: event_list.php");
      } else {
        echo "Error updating record: " . $conn->error;
      }
    }
   
  }
  $conn->close();

  ?>

  <p style="margin-bottom: 3rem;"></p>


  <script src="../controller/event_check.js"></script>
</body>

</html>


<?php
include("footer.php");
?>