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
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<title>Dashboard</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet"/>
	<link rel="stylesheet" type="text/css" href="/assets/css/header.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/main.css">
</head>

<body>
	<header class="col-12">
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

    <?php if($user->getType()=='E'||$user->getType()=='S'):?>
    <content style="float: left;" class="col-12">
    	<div class="row">
    		<div class="col-12">
	    		<div style="margin-top: 10px; margin-bottom: 10px;" class="content-heaader">
	    			<h2>Administrar tareas</h2>
	    		</div>
    		</div>

	    	<aside class="col-4">
	    		<div class="card">
	    			<div class="card-header">
	    				<strong>Calendario</strong>
	    			</div>

	    			<div class="card-body">
	    				<div class="calender-cont widget-calender">
	    					<div id="calendar"></div>
	    				</div>
	    			</div>
	    		</div>
	    		<br>
	    		<div class="card">
	    			<div class="card-header">
	    				<strong>Tareas calificadas</strong>
	    			</div>

	    			<div class="card-body">
	    				<table class="col-12">
	    					<tr>
	    						<th>Tarea</th>
	    						<th>Asignatura</th>
	    						<th>Calificación</th>
	    					</tr>

	    					<tr>
	    						<td>Ejercicios</td>
	    						<td>Matematicas</td>
	    						<td>4</td>
	    					</tr>
	    				</table>
	    			</div>
	    		</div>
	    	</aside>

	    	<div class="col-8">
	    		<div class="card">
	    			<div class="card-header">
	    				<strong>Tareas</strong>
	    			</div>
	    			<div class="card-body">
	    				<table class="col-12">
	    					<tr>
	    						<th>Tarea</th>
	    						<th>Asignatura</th>
	    						<th>Fecha de entrega</th>
	    						<th style="text-align: center;"></th>
	    					</tr>

	    					<tr>
	    						<td>Ejercicios</td>
	    						<td>Matematicas</td>
	    						<td>03/03/2020</td>
	    						<td><button class="btn btn-block">Entregar</button></td>
	    					</tr>

	    					<tr>
	    						<td>Consulta</td>
	    						<td>Biologia</td>
	    						<td>03/03/2020</td>
	    						<td><button class="btn btn-block">Entregar</button></td>
	    					</tr>
	    				</table>
	    			</div>
	    		</div>
	    	</div>
    	</div>
    </content>
	<?php endif; ?>

	<?php if($user->getType()=='P'||$user->getType()=='S'):?>
    <content style="float: left;" class="col-12">
    	<div class="row">
    		<div class="col-12">
	    		<div style="margin-top: 10px; margin-bottom: 10px;" class="content-heaader">
	    			<h2>Administrar tareas</h2>
	    		</div>
    		</div>

    		<div class="sub-menu col-12">
    			<div class="sub-menu-right">
    				<button class="btn" onclick="targetLocation('/control_diario?');"><i class="fa fa-calendar"></i> Nueva tarea</button>
    			</div>
    		</div>

	    	<aside class="col-3">
	    		<div class="card">
	    			<div class="card-header">
	    				<strong>Materias</strong>
	    			</div>

	    			<div class="card-body">
	    				<table>
	    					<tr><button class="btn btn-block">Biologia</button></tr>
	    					<tr><button class="btn btn-block">Quimica</button></tr>
	    				</table>
	    			</div>
	    		</div>
	    	</aside>

	    	<div class="col-9">
	    		<div class="card">
	    			<div class="card-header">
	    				<strong>Tareas</strong>
	    			</div>

	    			<div class="card-body">
	    				<table class="col-12">
	    					<tr>
	    						<th>Tarea</th>
	    						<th>Asignatura</th>
	    						<th>Curso</th>
	    						<th>Fecha de entrega</th>
	    						<th>Entregadas</th>
	    						<th style="text-align: center;"></th>
	    					</tr>

	    					<tr>
	    						<td>Ejercicios</td>
	    						<td>Quimica</td>
	    						<td>Sexto</td>
	    						<td>03/03/2020</td>
	    						<td>20 de 22</td>
	    						<td><button class="btn btn-block">Ver</button></td>
	    					</tr>

	    					<tr>
	    						<td>Consulta</td>
	    						<td>Biologia</td>
	    						<td>Sexto</td>
	    						<td>03/03/2020</td>
	    						<td>21 de 22</td>
	    						<td><button class="btn btn-block">Ver</button></td>
	    					</tr>
	    				</table>
	    			</div>
	    		</div>
	    		<br>
	    		<div class="card">
	    			<div class="card-header">
	    				<strong>Grupos (Biología)</strong>
	    			</div>

	    			<div class="card-body">
	    				<table class="col-12">
	    					<tr>
	    						<th>Curso</th>
	    						<th>Tareas</th>
	    						<th style="text-align: center;"></th>
	    					</tr>

	    					<tr>
	    						<td>Sexto</td>
	    						<td>5</td>
	    						<td><button class="btn btn-block">Ver</button></td>
	    					</tr>

	    					<tr>
	    						<td>Octavo</td>
	    						<td>5</td>
	    						<td><button class="btn btn-block">Ver</button></td>
	    					</tr>
	    				</table>
	    			</div>
	    		</div>
	    	</div>
    	</div>
    </content>
	<?php endif; ?>
    <footer>
    	
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="assets/js/init/fullcalendar-init.js"></script>
</body>
</html>