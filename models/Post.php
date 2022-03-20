<?php

include_once '../../config/Database.php';
class Post{
    private $conn;
    private $table='aeronave';

    //propiedades de la tabla
    public $Id;
    public $type;
    public $size;

    //constructor
    public function __construct($db){
        $this->conn = $db;
        

    }
    
    //get data
    public function read(){
        
        //consulta para las aeronaves 
        $query = 'SELECT Id ,t.desc_type as type ,s.desc_size as size
        FROM '.$this->table.' a INNER JOIN size s ON a.size = s.id_size INNER JOIN type t ON a.type = t.Id_type  ORDER BY Id ASC ;';
        //  $query = 'SELECT * FROM '.$this->table.';';
        // echo $query;
        $stmt = $this->conn->prepare($query);

        //ejecutar consulta
        $stmt -> execute();

        return $stmt;
    }

    public function read_single(){
        $query = 'SELECT Id ,t.desc_type as type ,s.desc_size as size
        FROM '.$this->table.' a INNER JOIN size s ON a.size = s.id_size INNER JOIN type t ON a.type = t.Id_type 
        WHERE a.id=?';
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->id);
        //ejecutar consulta
        $stmt -> execute();

        $row= $stmt->fetch(PDO::FETCH_ASSOC);
        //
        $this->type = $row['type'];
        $this->size = $row['size'];
        
    }

///funcion para crear una aeronave
    public function create(){
        //CREATE INSERT QUERY
        $query='INSERT INTO '.$this->table.' SET type= :type,size= :size';

        //prepare statement
        $stmt = $this->conn->prepare($query);

        //limpiar datos
        $this->type = htmlspecialchars(strip_tags($this->type));
        $this->size = htmlspecialchars(strip_tags($this->size));

        //asociacion de valores con identificadores

        $stmt->bindParam(':type',$this->type);
        $stmt->bindParam(':size',$this->size);

        //ejecutar query
        if($stmt->execute()){
            return true;
        }
        //imprimir errores 
        printf('Error: %s', $stmt->error);
        return false;
    }
///funcion para actualizar 
public function update(){
    //CREATE INSERT QUERY
    $query='UPDATE '.$this->table.' SET type= :type,size= :size WHERE Id= :id';
//
    //prepare statement
    $stmt = $this->conn->prepare($query);

    //limpiar datos
    $this->type = htmlspecialchars(strip_tags($this->type));
    $this->size = htmlspecialchars(strip_tags($this->size));
    $this->Id = htmlspecialchars(strip_tags($this->Id));

    //asociacion de valores con identificadores
    $stmt->bindParam(':id',$this->Id);
    $stmt->bindParam(':type',$this->type);
    $stmt->bindParam(':size',$this->size);

    //ejecutar query
    if($stmt->execute()){
        return true;
    }
    //imprimir errores 
    printf('Error: %s', $stmt->error);
    return false;
}


} ?>