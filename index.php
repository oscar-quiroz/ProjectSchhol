<?php
require 'includes/classes.php';

$userSession = new UserSession();
$errorMessage="";

if(isset($_SESSION['user'])){
	header('location: /dashboard');
}else{
	if(isset($_POST['username'])&&$_POST['password']){
		$id=User::exists($_POST['username'],md5($_POST['password']));

		if($id){
			$_SESSION['user'] = $id;
			header('location: /dashboard');
		}else
			$errorMessage="Usuario o contraseña incorrecta";
	}	
}
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
