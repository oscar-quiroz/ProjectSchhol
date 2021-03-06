<?php
class Person extends Database {
	protected $id;
	protected $name;
	protected $lname;
	protected $type;
	protected $groupId;
	protected $groupName;

	function __construct($f=0){
		parent::__construct();
		$this->id = $f;
		$query = $this->connect()->prepare('SELECT nombre_persona, apellido_persona, tipo_persona, id_grupo_estudiantes 
		FROM personas p 
		WHERE id_persona =:id');
		
		$query->execute(['id'=>$this->id]);

		foreach ($query as $currentPerson) {
            $this->name = $currentPerson['nombre_persona'];
            $this->lname = $currentPerson['apellido_persona'];
            $this->type = $currentPerson['tipo_persona'];
            $this->groupId = $currentPerson['id_grupo_estudiantes'];
        }

        if($this->groupId){
        	$query = $this->connect()->prepare('SELECT nombre_grupo 
			FROM grupos_estudiantes 
			WHERE id_grupo_estudiantes =:id');
			$query->execute(['id'=>$this->groupId]);
			$this->groupName=$query->fetch()['nombre_grupo'];
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

	public function getFullName(){
		return $this->name.' '.$this->lname;
	}

	public function getType(){
		return $this->type;
	}

	public function getGroupId(){
		return $this->groupId;
	}

	public function getGroupName(){
		return $this->groupName;
	}
}
?>