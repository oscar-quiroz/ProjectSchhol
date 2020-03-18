<?php
include '../includes/database.php';
print_r($_POST);

$insert='INSERT INTO tareas (id_clase, nombre_tarea, descripcion_tarea, plazo_maximo) VALUES
('.$_POST['class'].',"'.$_POST['header'].'","'.$_POST['desc'].'","'.$_POST['date'].' '.$_POST['time'].'")';

$db=new Database();



$db->connect()->exec('ALTER TABLE tareas AUTO_INCREMENT = 1');

$pdo=$db->connect();
$query=$pdo->exec($insert);
$id=$pdo->lastInsertId();
echo $id.'<br>';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if(isset($_FILES['files']))
		$files=$_FILES['files'];

	for ($i=0; $i < count($files['name']); $i++) {
		if (is_uploaded_file($_FILES['files']['tmp_name'][$i])) {
			if(empty($_FILES['files']['name'][$i])){
				echo " Archivo vacío ";
				exit;
			}

			$upload_file_name = $_FILES['files']['name'][$i];

			if(strlen ($upload_file_name)>100) {
				echo "El nombre del archivo es muy largo.";
				exit;
			}

			$upload_file_name = preg_replace("/[^A-Za-z0-9 \.\-_]/", '', $upload_file_name);

			if ($_FILES['files']['size'][$i] > 1000000) {
				echo "El archivo es muy grande.";
				exit;
			}

			$folder="../uploads/task_".$id;

			if(!file_exists($folder))
				mkdir($folder);

			$dest=$folder.'/'.$upload_file_name;

			if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $dest)) {
				echo 'El archivo ha sido subido con exito.';
			}
		} 
	}
}

header('location: ../dashboard');
?>