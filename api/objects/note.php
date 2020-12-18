<?php

class Note{

	private $conn;
	private $table_name = "notes";

	public $id;
	public $category_id;
	public $title;
	public $body;
	public $created;
	public $label;

	// constructor with database connection.
	public function __construct($db){
		$this->conn = $db;
	}

	function read(){

		$query = "SELECT categories.title, notes.id, notes.category_id, notes.title, notes.body, notes.created, notes.modified
					FROM notes
					LEFT JOIN categories ON notes.category_id = categories.id
					ORDER BY notes.created DESC";

		$stmt = $this->conn->prepare($query);
		$stmt->execute();

		return $stmt;
	}

	function create(){

		$query = "INSERT INTO notes SET category_id=:category_id, title=:title, body=:body, created=:created";

		$stmt = $this->conn->prepare($query);

		//filtering
		$this->category_id = htmlspecialchars(strip_tags($this->category_id));
		$this->title = htmlspecialchars(strip_tags($this->title));
		$this->body = htmlspecialchars(strip_tags($this->body));
		$this->created = htmlspecialchars(strip_tags($this->created));

		//values to placeholders
		$stmt->bindParam(":category_id", $this->category_id);
		$stmt->bindParam(":title", $this->title);
		$stmt->bindParam(":body", $this->body);
		$stmt->bindParam(":created", $this->created);

		if($stmt->execute()){

			return true;
		}
		else{
			
			return false;
		}
		
	}

	function readOne(){

		$query = "SELECT categories.title as label, notes.id, notes.title, notes.category_id, notes.body, notes.created
					FROM notes LEFT JOIN categories ON notes.category_id = categories.id WHERE notes.id =:id";

		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(":id", $this->id);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$this->title = $row['title'];
		$this->body = $row['body'];
		$this->category_id = $row['category_id'];
		$this->created = $row['created'];
		$this->label = $row['label'];

	}

	function update(){

		$query = "UPDATE notes SET title =:title, body=:body, category_id=:category_id WHERE id=:id";

		$stmt = $this->conn->prepare($query);

		$this->title = htmlspecialchars(strip_tags($this->title));
		$this->body = htmlspecialchars(strip_tags($this->body));
		$this->category_id = htmlspecialchars(strip_tags($this->category_id));
		$this->id = htmlspecialchars(strip_tags($this->id));

		$stmt->bindParam(':title', $this->title);
		$stmt->bindParam(':body', $this->body);
		$stmt->bindParam(':category_id', $this->category_id);
		$stmt->bindParam(':id', $this->id);

		if($stmt->execute()){

			return true;
		}
		else{
			
			return false;
		}

	}

	function delete(){

		$query = "DELETE FROM notes WHERE id=:id";

		$stmt = $this->conn->prepare($query);

		$this->id = htmlspecialchars(strip_tags($this->id));

		$stmt->bindParam(':id', $this->id);

		if($stmt->execute()){

			return true;
		}
		else{
			
			return false;
		}
	}
}

?>