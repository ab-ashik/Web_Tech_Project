<?php
include('../view/head.php');
?>
<?php
include 'conn.php';

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else{

if(isset($_POST['submit'])) {
$id = $_POST['clientId'];
$name = $_POST['clientName'];
$complain = $_POST['clientComplain'];


$sql = "INSERT INTO complain (id, name, complain)
VALUES ('$id', '$name', '$complain')";

if ($conn->query($sql) === TRUE) {
  echo "Your Complain Submitted successfully <br>";
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