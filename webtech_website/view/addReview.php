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


// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else{

if(isset($_POST['submit'])) {
$id = $_POST['clientId'];
$name = $_POST['clientName'];
$review = $_POST['clientReview'];


$sql = "INSERT INTO review (id, name, review)
VALUES ('$id', '$name', '$review')";

if ($conn->query($sql) === TRUE) {
  echo "Your Review Submitted successfully <br>";
  echo "<a href='index_client.php'>Back</a>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();
}
?>
<?php
include('../view/footer.php');
?>