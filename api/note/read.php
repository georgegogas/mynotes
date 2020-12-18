<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objects/note.php';

$database = new Database();
$db = $database->getConnection();

$note = new Note($db);

$stmt = $note->read();
$num = $stmt->rowCount();

if($num > 0){

	$notes_arr = array();
	$notes_arr["records"]=array();

	while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

		extract($row);

		$note_item = array(
			"id" => $id,
			"category_id" => $category_id,
			"created" => $created,
			"title" => $title,
			"body" => html_entity_decode($body)
		);

		array_push($notes_arr["records"], $note_item);

	}

	echo json_encode($notes_arr);

}
else{

	http_response_code(404);
	echo json_encode( array('message' => "No notes found.."));
}


?>