<?php
class User extends Person{
	protected $username;
	protected $password;

	function __construct(){
		parent::__construct();
	}

	public static function exists($username,$password){
		$database= new Database();

		$query = $database->connect()->prepare('SELECT id_persona 
			FROM personas 
			WHERE usuario_persona = :username 
			AND contrasena_persona = :password');

        $query->execute(['username' => $username, 'password' => $password]);
        
        if($query->rowCount())
        	return $query->fetch()['id_persona'];
        else
            return false;
	}
}
?>