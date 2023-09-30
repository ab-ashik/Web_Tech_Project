<?php
include ("conn.php");


// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else{
// insert start

if(isset($_POST['submit'])){
$id = $_POST['clientId'];
$name = $_POST['clientName'];
$email = $_POST['clientEmail'];
$phone = $_POST['clientPhone'];
$address = $_POST['clientAddress'];
$password = $_POST['clientPass'];
$role = $_POST['role'];




/////////////////////////////////////

if($role == "client")
{
  $sql2 = "INSERT INTO loginInfo (id, passwords, roles)
  VALUES ('$id', '$password', '$role')";


  $sql = "INSERT INTO client (clientId, clientName, clientEmail, clientPhone, clientAdrs, clientPassword)
VALUES ('$id', '$name', '$email', '$phone', '$address', '$password')";

if ($conn->query($sql) === TRUE) {
  echo "sql record created successfully <br>";

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
if ($conn->query($sql2) === TRUE) {
  echo "sql2 record created successfully <br>";

} else {
  echo "Error: " . $sql2 . "<br>" . $conn->error;
}

}
///////////////////////////////


if($role == "vendor")
{
  $sql2 = "INSERT INTO loginInfo (id, passwords, roles)
  VALUES ('$id', '$password', '$role')";


  $sql = "INSERT INTO vendor (vendorId, vendorName, vendorEmail, vendorPhone, vendorAdrs, vendorPassword)
VALUES ('$id', '$name', '$email', '$phone', '$address', '$password')";

if ($conn->query($sql) === TRUE) {
  echo "sql record created successfully <br>";

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
if ($conn->query($sql2) === TRUE) {
  echo "sql2 record created successfully <br>";

} else {
  echo "Error: " . $sql2 . "<br>" . $conn->error;
}


}

///////////////////////////////////////////



}
$conn->close();
}

?>