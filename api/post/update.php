<?php
//headers
header('Acces-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
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

$post->Id = $data->Id;
$post->type = $data->type;
$post->size = $data->size;

//actualizar aeronave
if($post->update()){
    echo json_encode(
        array('mensaje'=>'aeronave actualizada')
    );
}else{
    echo json_encode(
        array('mensaje'=>'No se ha modificado')
    );
}
?>
