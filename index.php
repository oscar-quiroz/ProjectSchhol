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
	

	
<body class="text-center bg-primary">
	<?php echo $errorMessage;?>
	<div class="container">
  	<div class="row justify-content-center">
    	<div class="col-md-6">
                <div class="card o-hidden border-0 shadow-lg my-5">        
                  <div class="card-header"><center>Iniciar Sesion!.</center></div>
                  <div class="card-body p-0">
		<div class="p-5">
                    <form class="form-signin" method="POST">
                      <img src="mb-4" src="/img/avatar.png" alt="avatar.png"  width="72" height="72">
                      <input type="text" name="user-text" id="user-text" class="form-control"  placeholder="Nombre de usuario" required autofocus>
                      <br>
                      <input type="password" name="password" class="form-control"  placeholder="Contraseña" required autofocus>
                      <br>
                      <button class="btn btn-lg btn-success btn-block" type="submit">Ingresar</button>
                    </form>
                    <hr>
                    <div class="text-center">
                      <a class="small" href="#"> Olvidaste tu contraseña?.</a>
                      <hr>
                    </div>
		</div>                    
                </div>
                </div>
      </div>
  </div>
</div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
