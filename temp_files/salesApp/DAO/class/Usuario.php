<?php 

class Usuario {

	private $id;
	private $login;
	private $senha;
	private $cadastro;

	public function getId(){
		return $this->id;
	}

	public function setId($value){
		$this->id = $value;
	}

	public function getlogin(){
		return $this->login;
	}

	public function setlogin($value){
		$this->login = $value;
	}

	public function getsenha(){
		return $this->senha;
	}

	public function setsenha($value){
		$this->senha = $value;
	}

	public function getcadastro(){
		return $this->cadastro;
	}

	public function setcadastro($value){
		$this->cadastro = $value;
	}
	
	public function loadById($id){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM usuario WHERE id = :ID", array(
			":ID"=>$id
		));

		if (count($results) > 0) {

			$this->setData($results[0]);

		}

	}

	public static function getList(){

		$sql = new Sql();

		return $sql->select("SELECT * FROM usuario ORDER BY login;");

	}

	public static function search($login){

		$sql = new Sql();

		return $sql->select("SELECT * FROM usuario WHERE login LIKE :SEARCH ORDER BY login", array(
			':SEARCH'=>"%".$login."%"
		));

	}

	public function login($login, $password){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM usuario WHERE login = :LOGIN AND senha = :PASSWORD", array(
			":LOGIN"=>$login,
			":PASSWORD"=>$password
		));

		if (count($results) > 0) {

			$this->setData($results[0]);

		} else {

			throw new Exception("Login e/ou senha inválidos.");

		}

	}

	public function setData($data){

		$this->setId($data['id']);
		$this->setlogin($data['login']);
		$this->setsenha($data['senha']);
		$this->setcadastro(new DateTime($data['cadastro']));

	}

	public function insert(){

		$sql = new Sql();

		$results = $sql->select("CALL sp_usuarios_insert(:LOGIN, :PASSWORD)", array(
			':LOGIN'=>$this->getlogin(),
			':PASSWORD'=>$this->getsenha()
		));

		if (count($results) > 0) {
			$this->setData($results[0]);
		}

	}

	public function update($login, $password){

		$this->setlogin($login);
		$this->setsenha($password);

		$sql = new Sql();

		$sql->query("UPDATE usuario SET login = :LOGIN, senha = :PASSWORD WHERE id = :ID", array(
			':LOGIN'=>$this->getlogin(),
			':PASSWORD'=>$this->getsenha(),
			':ID'=>$this->getId()
		));

	}

	public function delete(){

		$sql = new Sql();

		$sql->query("DELETE FROM usuario WHERE id = :ID", array(
			':ID'=>$this->getId()
		));

		$this->setId(0);
		$this->setlogin("");
		$this->setsenha("");
		$this->setcadastro(new DateTime());

	}

	public function __construct($login = "", $password = ""){

		$this->setlogin($login);
		$this->setsenha($password);

	}

	public function __toString(){

		return json_encode(array(
			"id"=>$this->getId(),
			"login"=>$this->getlogin(),
			"senha"=>$this->getsenha(),
			"cadastro"=>$this->getcadastro()->format("d/m/Y H:i:s")
		));

	}

} 	
	


 ?>