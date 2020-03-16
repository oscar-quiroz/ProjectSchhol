<?php
require '../includes/classes.php';

$userSession = new UserSession();

if(isset($_SESSION['user'])){
	$user=new Person($_SESSION['user']);
}else{
	header('location: /');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
</head>
<body>
<header>
	<?php 
	echo $user->getType().PHP_EOL;
	echo '<br>';
	echo $user->getFullName().PHP_EOL;
	?>
</header>

<a href="/includes/logout.php">Cerrar sesión</a>
</body>
</html>