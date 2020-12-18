<?php
	
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Credentials: true");

include_once '../config/database.php';
include_once '../objects/note.php';

$database = new Database();
$db = $database->getConnection();

$note = new Note($db);

if(isset($_GET['id'])){

	$note->id = $_GET['id'];
}
else{

	die();
}

$note->readOne();

if($note->body != null){

	$note_arr = array("id" => $note->id,
					"category_id" => $note->category_id,
					"label" => $note->label,
					"title" => $note->title,
					"body" => $note->body);

	echo json_encode($note_arr);
}
else{

	http_response_code(404);
	echo json_encode(array('message' => 'Note doesnt exist.'));
}

?>