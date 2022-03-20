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

//consulta aeronaves
$result =  $post->read();

//obtener numero de filas
$num = $result->rowCount();

//verificar si hay datos
if($num>0){
//inicializar un array
$post_arr = array();
$post_arr['data']= array();

 while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

     extract($row);
     $post_item = array(
         'Id' => $Id,
         'type' => $type,
         'size' => $size
     );
     //push data
     array_push($post_arr['data'], $post_item);
 }
 //JSON
 echo json_encode($post_arr);
}else{// si la consulta no tiene datos
    echo json_encode(
        array('message'=>'no hay datos')
    );

}
?>





