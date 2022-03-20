<?php
//headers
header('Acces-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

//importar archivos
include_once '../../config/Database.php';
include_once '../../models/Post.php';

//instancia a db y conecta a la bd
$database = new Database();
$db = $database->connect();

//instanciar la clase post
$post = new Post($db);

//get data
$data = json_decode(file_get_contents("php://input"));

$post->type = $data->type;
$post->size = $data->size;

//crear aeronave
if($post->AeronavesLib()){
    echo json_encode(
        array('mensaje'=>'cola Liberada')
    );
}else{
    echo json_encode(
        array('mensaje'=>'No creado')
    );
}
?>
