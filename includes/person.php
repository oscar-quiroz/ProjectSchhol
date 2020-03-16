<?php
class Person extends Database {
	protected $id;
	protected $name;
	protected $lname;
	protected $type;
	protected $groupId;

	function __construct($f=0){
		parent::__construct();
		$this->id = $f;
		$query = $this->connect()->prepare('SELECT nombre_persona, apellido_persona, tipo_persona, id_grupo_estudiantes 
		FROM personas p 
		WHERE id_persona =:id');
		
		$query->execute(['id'=>$this->id]);

		foreach ($query as $currentPerson) {
            $this->name = $currentPerson['nombres_persona'];
            $this->lname = $currentPerson['apellidos_persona'];
            $this->type = $currentPerson['tipo_persona'];
            $this->groupId = $currentPerson['id_grupo_estudiantes'];
        }
	}

	public function getId(){
		return $this->id;
	}

	public function getName(){
		return $this->name;
	}

	public function getLastName(){
		return $this->lname;
	}

	public function getType(){
		return $this->type;
	}

	public function getGroupId(){
		return $this->groupId;
	}
}
?>