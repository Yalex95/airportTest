<?php
//headers
header('Acces-Control-Allow-Origin: *');
header('Content-Type: application/json');

//importar archivos
include_once '../../config/Database.php';
include_once '../../models/Post.php';

//instancia a db y conecta a la bd
$database = new Database();
$db = $database->connect();

//instanciar la clase post
$post = new Post($db);
//obtener el id de la url
$post->id= isset($_GET['id'])? $_GET['id']:die();
//obtener consulta
$post->read_single();

$post_arr= array(
    'id'=>$post->id,
    'type'=>$post->type,
    'size'=>$post->size
);
//JSON
// print_r(json_encode($post_arr));
echo json_encode($post_arr);