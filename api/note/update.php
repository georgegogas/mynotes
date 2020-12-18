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

$note->id = $data->id;

if($data->title != null){
	$note->title = $data->title;
}
else{
	$note->title = '';
}

if($data->body != null){
	$note->body = $data->body;
}
else{
	$note->body = '';
}

if($data->category_id != null){
	$note->category_id = $data->category_id;
}
else{
	$note->category_id = '1';
}



if($note->update()){

	echo json_encode(array('message' => 'Note updated successfully!'));
}
else{

	http_response_code(503);
	echo json_encode(array('message' => 'Unable to update note.'));
}

?>