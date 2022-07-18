<?php 

namespace Asw\Database;

use Acme\Interfaces\Imodel;

use Asw\Database\Connection;

use Asw\Database\AttributesCreate;

use Asw\Database\AttributesUpdate;

use PDOException;


class AswModel implements Imodel{


	private $database;


	public function __construct(){

		$database = new Connection;

		$this->database = $database->connection();

	}

	public function create($attributes){

		$attributesCadastrar = new AttributesCreate;

		$fields = $attributesCadastrar->createFields($attributes);

		$values = $attributesCadastrar->createValues($attributes);

		$query = "insert into $this->table($fields) values($values)";

		$pdo = $this->database->prepare($query);

		$bindParameters = $attributesCadastrar->bindCreateParameters($attributes);

		try{

			$pdo->execute($bindParameters);

			return $this->database->lastInsertId();
			
		}catch(PDOException $e){

			dump($e->getMessage());

		}

	}

	public function read($ord){

		$query="select * from $this->table order by $ord";

		$pdo = $this->database->prepare($query);

		try{

			$pdo->execute();

			return $pdo->fetchAll();

		}catch(PDOException $e){

			dump($e->getMessage());

		}

	}

	public function update($id,$attributes){

		$attributesUpdate = new AttributesUpdate;

		$fields = $attributesUpdate->updateFields($attributes);

		$query = "update $this->table set $fields where id = :id";

		$pdo = $this->database->prepare($query);

		$bindUpdateParameters = $attributesUpdate->bindUpdateParameters($attributes);

		$bindUpdateParameters['id'] = $id;

		try{

			$pdo->execute($bindUpdateParameters);

			return $pdo->rowCount();


		}catch(PDOException $e){

			dump($e->getMessage());

		}

	}

	public function delete($name,$value){

		$query = "delete from $this->table where $name = :$name";
		
		$pdo = $this->database->prepare($query);

		try{

			$pdo->bindParam(":$name",$value);

			$pdo->execute();

			return $pdo->rowCount();

		}catch(PDOException $e){

			dump($e->getMessage());

		}

	}

	public function findBy($name,$value){

		$query = "select * from $this->table where $name = $value";
		
		$pdo = $this->database->prepare($query);

		try{

			$pdo->execute();

			return $pdo->fetch();

		}catch(PDOException $e){

			dump($e->getMessage());

		}

	}

	public function findByTwo($name,$value,$name2,$value2){

		$query = "select * from $this->table where $name = $value and $name2 = $value2";
		
		$pdo = $this->database->prepare($query);

		try{

			$pdo->execute();

			return $pdo->fetch();

		}catch(PDOException $e){

			dump($e->getMessage());

		}

	}
}
