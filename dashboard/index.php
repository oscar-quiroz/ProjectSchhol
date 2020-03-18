<?php
require '../includes/classes.php';

$userSession = new UserSession();
if(isset($_SESSION['user'])){
	$user=new Person($_SESSION['user']);

}else{
	header('location: /');
}

setlocale(LC_TIME, 'es_ES@euro','es_ES');
date_default_timezone_set('America/Bogota');
?>
<!DOCTYPE html>
<html>
<head> 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Dashboard</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/assets/css/header.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/main.css">	
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
	<header class="col-lg-12">
		<a href="/dashboard">
            <img id="logo-app" src="/images/logo.png">
        </a>

        <div class="user-area">
            <div class="dropdown menu-item">
                <button class="main-menu-item">
                    <img src="/images/admin.png">
                </button>
                <br>
                <div class="dropdown-content-right">
                    <a><?php echo $user->getFullName();?></a>
                    <a href="/includes/logout.php"><i class="fa fa-power-off"></i> Cerrar sesión</a>
                </div>
            </div>
        </div>
    </header>

    <?php 
    if($user->getType()=='E'||$user->getType()=='S')
    	include 'dashboard-student.php';

    if($user->getType()=='P'||$user->getType()=='S')
    	include 'dashboard-teacher.php';
    ?>

    <footer>
    	
    </footer>
</body>
</html>