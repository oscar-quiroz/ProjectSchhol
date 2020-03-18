<?php
class Task {
	private $id;
	private $name;
	private $desc;
	private $limitDate;
	private $subject;
	private $deliveredQuantity;

	function __construct($id, $name, $desc, $limitDate, $subject){
		$this->id=$id;
		$this->name=$name;
		$this->desc=$desc;
		$this->limitDate=$limitDate;
		$this->subject=$subject;
		$this->deliveredQuantity=0;
	}

	public function getId(){
		return $this->id;
	}

	public function getName(){
		return $this->name;
	}

	public function getDescription(){
		return $this->desc;
	}

	public function getLimitDate(){
		return $this->limitDate;
	}

	public function getSubject(){
		return $this->subject;
	}

	public function getDeliveredQuantity(){
		return $this->deliveredQuantity;
	}
}
?>