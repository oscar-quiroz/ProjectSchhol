<?php
class SubjectGroup extends Database {
	private $id;
	private $subjects;
	private $tasks;

	function __construct($studentGId, $type){
		parent::__construct();
		$this->id = $studentGId;

		$query = $this->connect()->prepare('SELECT m.id_materia, nombre_materia
		FROM grupos_materias gm
		INNER JOIN clases c ON gm.id_clase=c.id_clase
		INNER JOIN materias m ON c.id_materia=m.id_materia 
		WHERE '.($type=='E'?'id_grupo_estudiantes':'id_profesor').' =:id');
		
		$query->execute(['id'=>$this->id]);

		if($query->rowCount())
			$this->subjects=[];

		$i=0;

		foreach ($query as $row) {
			$this->subjects[$i]=[];
			$this->subjects[$i]['id']=$row['id_materia'];
			$this->subjects[$i]['nombre']=$row['nombre_materia'];
			$i++;
		}

		$query = $this->connect()->prepare('SELECT id_tarea, nombre_tarea, descripcion_tarea, plazo_maximo, nombre_materia
		FROM grupos_materias gm
		INNER JOIN clases c ON gm.id_clase=c.id_clase
		INNER JOIN tareas t ON t.id_clase=c.id_clase
		INNER JOIN materias m ON c.id_materia=m.id_materia
		WHERE '.($type=='E'?'id_grupo_estudiantes':'id_profesor').' =:id 
		ORDER BY plazo_maximo');
		
		$query->execute(['id'=>$this->id]);

		if($query->rowCount())
			$this->tasks=[];

		$i=0;

		foreach ($query as $row) {
			$this->tasks[$i]=new Task($row['id_tarea'],$row['nombre_tarea'],$row['descripcion_tarea'],$row['plazo_maximo'],$row['nombre_materia']);
			$i++;
        }

	}

	public function getId(){
		return $this->id;
	}

	public function getTasks(){
		return $this->tasks;
	}

	public function getSubjects(){
		return $this->subjects;
	}
}
?>