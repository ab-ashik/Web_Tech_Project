<!DOCTYPE html>
<html>
<body>
	<table>
		<tr>
		<?php 

session_start();
unset($_SESSION['loginId']);
unset($_SESSION['role']);
setcookie('status', 'true', time()-10, '/');
//header('location: Login.php');

?>
	<td><b><i> Want to leave? </i></b><a href="../view/start.php">Logout</a></td>
</tr>
</table>
</body>
</html>

