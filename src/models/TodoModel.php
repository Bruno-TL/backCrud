<?php

include_once '../src/connection/ConnectionDb.php';

class TodoModel {
    private $conn;

    public function __construct() {
        $this->conn = new ConnectionDb();
    }

    private function executeQuery(string $sql) :array
    {
        $conn = $this->conn->openConnection();
        $result = $conn->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getItens() :array
    {
        try{
            $sql = "SELECT * FROM crud_php.todo";
            $result = $this->executeQuery($sql);
            $list = [
                $result,
                'status' => 200,
                'message' => 'Sucess'
            ];
            return $list;
        }catch(\Throwable $th){
            $erro = [
                'status' => 500,
                'message' => $th->getMessage()
            ];
            return $erro;
        }
        
    }
}