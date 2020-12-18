<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../objects/note.php';

$database = new Database();
$db = $database->getConnection();

$note = new Note($db);

$data = json_decode(file_get_contents("php://input"));

if(!empty($data->category_id) &&
	!empty($data->title) &&
	!empty($data->body)){

	$note->category_id = $data->category_id;
	$note->title = $data->title;
	$note->body = $data->body;
	$note->created = date('Y-m-d H:i:s');

	if($note->create()){

		echo json_encode(array('message' => 'Note created!'));
	}
	else{

		http_response_code(503);
		echo json_encode(array('message' => 'Unable to create the note.'));
	}

}
else{

	http_response_code(400);
	echo json_encode(array('message' => 'Unable to create the note. Missing fields.'));
}

?>