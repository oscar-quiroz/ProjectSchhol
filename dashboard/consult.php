<?php
include '../includes/database.php';


switch ($_POST['consult']) {
	case 'classList':
		getClassList();
		break;
	
	default:
		print_r($_POST);
		break;
}

function getClassList(){
	$db=new Database();

	$query=$db->connect()->prepare('SELECT c.id_clase, nombre_grupo
		FROM clases c
		INNER JOIN grupos_materias gm ON gm.id_clase=c.id_clase
		INNER JOIN grupos_estudiantes ge ON gm.id_grupo_estudiantes=ge.id_grupo_estudiantes
		WHERE id_materia='.$_POST['subjectId']);

	$query->execute();
	$ids='';
	echo '<option value="">Seleccione un grupo</option>';
	foreach ($query as $row) {
		echo '<option value="'.$row['id_clase'].'">'.$row['nombre_grupo'].'</option>';
		$ids=$ids.'-'.$row['id_clase'];
	}

	echo '<option value="'.substr($ids, 1).'">TODOS</option>';
}

?>