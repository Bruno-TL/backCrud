<?php

include_once '../src/connection/ConnectionDb.php';

class TodoModel {
    private $conn;

    public function __construct() {
        $this->conn = new ConnectionDb();
    }

    private function executeQuery(string $sql, $typeQuery = 'select') :array
    {
        try{
            $conn = $this->conn->openConnection();
            if($typeQuery == 'select') {
                $resultQuery = $conn->query($sql);
                $result = $resultQuery->fetchAll(PDO::FETCH_ASSOC);
                empty($result) ? 
                $list = [
                    'status' => 404,
                    'message' => 'NOT FOUND'
                ]:
                $list = [
                    $result,
                    'status' => 200,
                    'message' => 'Sucess'
                ];
                return $list;
            }else {
                $conn->query($sql);
                $list = [
                    'status' => 200,
                    'message' => 'Sucess'
                ];
                return $list;
            }
        }catch(\Throwable $th){
            $erro = [
                'status' => 500,
                'message' => $th->getMessage()
            ];
            return $erro;
        }
        
    }

    public function getItem(int $id) :array
    {
        $sql = "SELECT * FROM crud_php.todo WHERE id = {$id}";
        return $this->executeQuery($sql);
    }

    public function getItens() :array
    {
        $sql = "SELECT * FROM crud_php.todo";
        return $this->executeQuery($sql);
    }

    public function updateItem(int $id,string $name, string $email,string $phone): array
    {
        $typeQuery = 'update';
        $sql = "UPDATE crud_php.todo SET name = {$name}, email = {$email}, phone = {$phone} WHERE id = {$id}";
        return $this->executeQuery($sql,$typeQuery);
    }

    public function createItem(string $name, string $email,string $phone): array
    {
        $typeQuery = 'create';
        $sql = "INSERT INTO crud_php.todo (name, email, phone) VALUES ('{$name}', '{$email}', '{$phone}')";
        return $this->executeQuery($sql,$typeQuery);
    }

    public function deleteItem(int $id)
    {
        $typeQuery = 'delete';
        $sql = "DELETE FROM crud_php.todo WHERE id = {$id}";
        return $this->executeQuery($sql,$typeQuery);
    }
}