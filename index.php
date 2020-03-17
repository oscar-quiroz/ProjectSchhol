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
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="/images/favicon.png" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>Bienvenido a <?php echo $APP['name']?></title>
</head>

<body class="text-center bg-primary">
  <div class="container">
    <div class="row justify-content-center">
    	<div class="col-md-6">
        <div class="card o-hidden border-0 shadow-lg my-5">      
          <div class="card-body p-0">
            <div class="p-5">
              <form class="form-signin" method="POST">
                <img src="/images/logo.png" width="400px">
                <br>
                <label style="margin-bottom: 20px;">para <strong><?php echo $APP['school-name'];?></strong></label>
                <br>
                <label style="color: red;"><?php echo $errorMessage;?></label>
                <input type="text" name="username" class="form-control"  placeholder="Nombre de usuario" required autofocus>
                <br>
                <input type="password" name="password" class="form-control"  placeholder="Contraseña" required>
                <br>
                <button class="btn btn-lg btn-success btn-block" type="submit">Ingresar</button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="" hidden>¿Olvidaste tu contraseña?</a>
                <hr>
              </div>
            </div> 
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
