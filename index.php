<?php
require 'includes/classes.php';
$errorMessage="";
if(User::exists($_POST['username'],md5($_POST['password'])))
	header('location: /dashboard');
else
	$errorMessage="Usuario o contraseña incorrecta";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bienvenido a </title>
</head>

<body>
	<?php echo $errorMessage;?>
	<form method="POST">
		<input type="text" name="username" required>
		<input type="password" name="password" required>
		<button>Ingresar</button>
	</form>

</body>
</html>
