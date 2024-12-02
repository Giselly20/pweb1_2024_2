<?php

class db {

    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $port = "3307";
    private $dbname ="db_pweb1_2024_2_blog";
    private $table_name;

    public function __construct($table_name){
        $this->conn();
        $this->table_name = $table_name;

    }
    

   public function conn(){

        try{
            $conn = new PDO(//objeto
                "mysql:host=$this->host;dbname=$this->dbname;port=$this->port;",
                $this->user,
                $this->password,
                [
                    PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION,
                    PDO::MYSQL_ATTR_INIT_COMMAND =>" SET NAMES utf8"
                ]
            );

            return $conn;

        } catch(PDOException $e){
            echo "Erro: ". $e->getMessage();
        }
        
    }
    public function insert($data){

        $conn = $this->conn();
        $sql = "INSERT INTO $this->table_name (";
        $flag = 0;
        $array_values = [];
        unset($data["id"]);

        foreach ($data as $campo => $valor) {
            $sql .= $flag == 0 ? "$campo" : ",$campo";
            $flag = 1;

        }
        $sql .= ") VALUES (";
        $flag = 0;
        
        foreach ($data as $campo => $valor) {
            $sql .= $flag == 0 ? "?" : ",?";
            $flag = 1;
            $array_values[] = $valor; 
        }
        $sql .= ")";

        $stmt = $conn->prepare($sql);
        $stmt->execute($array_values);
            
    }

    public function all($table_name = null){

        $table_name =!empty($table_name) ? $table_name : $this->table_name;

        $conn = $this->conn();

        $sql = "SELECT * FROM $table_name";

        $st = $conn->prepare($sql);

        $st->execute();

        return $st->fetchALL(PDO::FETCH_CLASS);

            
    }
    public function destroy($id){
        $conn = $this->conn();

        $sql = "DELETE FROM $this->table_name WHERE id =?";

        $stmt = $conn->prepare($sql);

        $stmt->execute([$id]);
            
    }
    public function search($dados){

        $campo = $dados['tipo'];
        $valor = $dados['valor'];

        $conn = $this->conn();

        $sql = "SELECT * FROM $this->table_name WHERE $campo LIKE ?";

        $st = $conn->prepare($sql);

        $st->execute(["%$valor%"]);

        return $st->fetchALL(PDO::FETCH_CLASS);

            
    }

    public function find($id, $table_name = null){

        $table_name = !empty($table_name) ? $table_name : $this->table_name;

        $conn = $this->conn();

        $sql = "SELECT * FROM $table_name WHERE id LIKE ?";

        $st = $conn->prepare($sql);

        $st->execute([$id]);

        return $st->fetchObject();

    }

    public function update($data){


    //var_dump($dados);
    //  exit;
    $conn = $this->conn();
    $sql = "UPDATE $this->table_name SET ";
    $flag = 0;
    $id = $data['id'];
    $array_values = [];

    foreach ($data as $campo => $valor) {
        $sql .= $flag == 0 ? "$campo=?" : ",$campo=?";
        $flag = 1;
        $array_values[] = $valor;
    }
    $sql .= " WHERE id = $id";
    $stmt = $conn->prepare($sql);
    $stmt->execute($array_values);
            
    }
}
?>
